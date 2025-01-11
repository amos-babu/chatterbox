<?php

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandleMessageSent implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(MessageSent $event)
    {
        // Logic to handle the incoming message and broadcast it to the recipient
        $message = $event->message;

        // Broadcast the message to the recipient using Laravel Echo
        broadcast(new MessageSent($message, $event->recipient_id))->toOthers();
    }
}
