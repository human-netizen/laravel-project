<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
}