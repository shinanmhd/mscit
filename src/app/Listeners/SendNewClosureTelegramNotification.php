<?php

namespace App\Listeners;

use App\Events\ClosureAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Telegram\Bot\Laravel\Facades\Telegram;

class SendNewClosureTelegramNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClosureAdded $event): void
    {
        $response_text = "<b>New <u>". $event->closure->closureType->type ."</u> Added by: </b>".$event->closure->user->name."\n" .
            "--------------------------\n" .
            "<b>Road: </b>" . $event->closure->work_road . "\n" .
            "<b>From: </b>" . $event->closure->closure_to . "\n" .
            "<b>To: </b>" . $event->closure->closure_to;

        $chat_id = "-4207745559";
        $response = Telegram::bot('mybot')
            ->sendMessage([
                "chat_id" => $chat_id,
                'text' => $response_text,
                "parse_mode" => "HTML",
            ]);
    }
}
