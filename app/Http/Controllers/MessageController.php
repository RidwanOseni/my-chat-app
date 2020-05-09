<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getMessagesFor($id)
    {
        $messages = Message::where('from', $id)
        ->orwhere('to', $id)
        ->get();

        return response()->json($messages);
    }



    public function send(Request $request)
    {
    $message = Message::create([
    'from' => auth()->id(),
    'to' => $request->contact_id,
    'text' => $request->text
        ]);



        return response()->json($message);
    }
}