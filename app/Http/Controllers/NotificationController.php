<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'to_id' => 'required',
            'from_id' => 'required',
            'battle_id' => 'required',
            'contest_id' => 'required',
            'index' => 'required',
            'problem_name' => 'required',
        ]);
        $notification = Notification::create($request->all());
        $previousPageUrl = $request->header('referer');
        return redirect()->to($previousPageUrl)->with('success', 'Notification created successfully.');

    }
}
