<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function submitSolution(Request $request)
    {
        $client = new Client();
        $response = $client->post('http://127.0.0.1:5000/submit', [
            'form_params' => [
                'contest_id' => $request->input('contest_id'),
                'problem_index' => $request->input('problem_index'),
                'language_id' => $request->input('language_id'),
                'solution_code' => $request->input('solution_code')
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        return $data;
    }
    public function submitSolutionById(Request $request , $id)
    {
        $data = $this->submitSolution($request);
        $submissionid = $data['submission_id'];
        $battle = Battle::findOrFail($id);
        if($battle->user1_id == auth()->id()) {
            
            $battle->update([
                'user1_submission_id' => $submissionid,
            ]);
        }
        else if($battle->user2_id == auth()->id()) {
            
            $battle->update([
                'user2_submission_id' => $submissionid,
            ]);
        }
        
        $battle->save();
        return redirect()->back()->with('status', 'Solution submitted successfully!');
    }
}