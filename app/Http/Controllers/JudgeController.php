<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JudgeController extends Controller
{
    public function index(Request $request){

        return view('judge.index' , [
            'id' => $request->id,
            'task' => $request->task
        ]);
    }
}
