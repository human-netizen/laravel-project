<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Battle;
use GuzzleHttp\Client;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BattleController extends Controller
{
    public function create(Request $request)
    {
        $username = $request->input('username');
        $user2 = User::where('username', $username)->first();
        $battle = Battle::create([
            'user1_id' => Auth::id(),
            'user2_id' => $user2->id,
            'contest_id' => $request->contest_id,
            'problem_index' => $request->problem_index,
            'status' => 'pending',
        ]);

        $notification = Notification::create([
            'to_id' => $user2->id,
            'from_id' => Auth::id(),
            'battle_id' => $battle->id,
            'contest_id' => $battle->contest_id,
            'index' => $battle->problem_index,
            'problem_name' => $request->problem_name,
        ]);

        return back()->with('status', 'Battle invitation sent!');
    }

    public function acceptBattle($id)
    {
        $battle = Battle::findOrFail($id);
        if($battle->status != 'pending') {
            return back()->with('status', 'Battle is not accepted!');
        }
        $battle->update([
            'status' => 'accepted',
            'start_time' => Carbon::now()->addMinutes(5),
            'duration' => 5,
        ]);

        return back()->with('status', 'Battle accepted!');
    }
    public function rejectBattle($id)
    {
        $battle = Battle::findOrFail($id);
        $battle->update([
            'status' => 'rejected',
        ]);

        return back()->with('status', 'Battle rejected!');
    }

    public function battleground()
    {
        $battles = Battle::where('user1_id', Auth::id())->orWhere('user2_id', Auth::id())->get();

        return view('judge.battleground', compact('battles'));
    }
    public function result($id)
    {
        
        $battle = Battle::findOrFail($id);

        if (!$battle->user1_submission_id || !$battle->user2_submission_id) {
            return back()->with('status', 'Submissions not available for this battle.');
        }

        $client = new Client();

        $user1Response = $client->get("http://127.0.0.1:5000/get_submission_details/{$battle->user1_submission_id}");
        $user1Submission = json_decode($user1Response->getBody()->getContents(), true);

        $user2Response = $client->get("http://127.0.0.1:5000/get_submission_details/{$battle->user2_submission_id}");
        $user2Submission = json_decode($user2Response->getBody()->getContents(), true);

        $user1Verdict = $user1Submission['verdict'];
        $user1CreationTime = $user1Submission['creation_time'];

        $user2Verdict = $user2Submission['verdict'];
        $user2CreationTime = $user2Submission['creation_time'];

        $result = 'Draw';

        if ($user1Verdict === 'ACCEPTED' && $user2Verdict !== 'ACCEPTED') {
            $result = 'User 1 Wins';
        } elseif ($user2Verdict === 'ACCEPTED' && $user1Verdict !== 'ACCEPTED') {
            $result = 'User 2 Wins';
        } elseif ($user1Verdict === 'ACCEPTED' && $user2Verdict === 'ACCEPTED') {
            if ($user1CreationTime < $user2CreationTime) {
                $result = 'User 1 Wins';
            } else {
                $result = 'User 2 Wins';
            }
        }

        $user1 = User::find($battle->user1_id);
        $user2 = User::find($battle->user2_id);

        return view('judge.result', compact('battle', 'result', 'user1Submission', 'user2Submission', 'user1', 'user2'));
    }
}

