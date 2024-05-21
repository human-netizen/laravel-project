<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class ProblemController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('https://codeforces.com/api/problemset.problems');

        $problems = $response->json()['result']['problems'];
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 50;
        $currentItems = array_slice($problems, ($currentPage - 1) * $perPage, $perPage);
        $problems = new LengthAwarePaginator($currentItems, count($problems), $perPage);

        $problems->setPath($request->url());

        return view('judge.problem_page', compact('problems'));
    }
    public function notifyUser(Request $request)
    {
        // Validate the input
        $request->validate([
            'username' => 'required|string|exists:users,username',
        ]);

        // Retrieve the user by username
        $username = $request->input('username');
        $user = User::where('username', $username)->first();
        $contestId = $request->input('contestId');
        $index = $request->input('index');
        $content = "https://codeforces.com/problemset/problem/" . $contestId . "/" . $index;
        Notification::create([
            'from_id' => auth()->id(),
            'to_id' => $user->id,
            'content' => $content,
        ]);
        
        // Perform some action
        // For example, log a message or update user details
        // Log::info('User found: ' . $user->name);

        // Return a response or redirect
        return redirect()->back()->with('status', 'User found: ' . $user->name);
    }
}
