<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ExampleEvent;


class ExampleController extends Controller
{
    public function triggerEvent()
    {
        $message = 'This is a test message!';
        broadcast(new ExampleEvent($message))->toOthers();

        return response()->json(['status' => 'Event triggered!']);
    }
}
