<?php

namespace App\Listeners;

use App\Events\ThreadReceivedNewReply;
use App\Notifications\YouWereMentioned;
use App\User;

class NotifyMentionedUsers
{

    public function handle(ThreadReceivedNewReply $event)
    {
        $mentionedUsers = $event->reply->mentionedUsers();

        collect($event->reply->mentionedUsers())
        ->map(function ($name) {
            return User::where('name', $name)->first();
        })
        ->filter()
        ->each(function ($user) use ($event) {
            $user->notify(new YouWereMentioned($event->reply));
        });
    }
}
