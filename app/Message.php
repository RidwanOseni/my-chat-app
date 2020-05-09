<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    protected $appends = ['sender', 'receiver'];

    public function getSenderAttribute()
    {
        return User::where('id', $this->from)->first();
    }

    public function getReceiverAttribute()
    {
        return User::where('id', $this->to)->first();
    }
}
