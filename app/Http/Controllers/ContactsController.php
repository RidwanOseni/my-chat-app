<?php

namespace App\Http\Controllers;


use App\Message;
use App\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function get()
    {   //get all users except the authenticated one
        $contacts = User::where('id', '!=', auth()->id())->get();

        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
        ->where('to', auth()->id())
        ->where('read', false)
        ->groupBy('from')
        ->get();

        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });



        return response()->json($contacts);
    }
}
