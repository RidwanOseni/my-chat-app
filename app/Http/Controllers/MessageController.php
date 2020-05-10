<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Message;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function getMessagesFor($id)
    {
        $messages = Message::where('from', $id)
        ->orwhere('to', $id)
        ->get();

        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get(); //(a = 1 AND b = 2) OR (c = 1 OR d = 2)

        return response()->json($messages);
    }



    public function send(Request $request)
    {
    $message = Message::create([
    'from' => auth()->id(),
    'to' => $request->contact_id,
    'text' => $request->text
        ]);

        broadcast(new NewMessage($message));

        return response()->json($message);
    }
}
