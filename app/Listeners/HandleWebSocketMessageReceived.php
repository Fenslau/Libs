<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use \App\Models\User;
use \App\Models\Messages;
use Illuminate\Support\Facades\Log;

class HandleWebSocketMessageReceived
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Log::info(json_encode($event, true));
        // if ($event->decodedMessage['event'] == 'pusher:subscribe' AND $event->decodedMessage['data']['channel'] == 'presence-presence') dump(json_decode($event->decodedMessage['data']['channel_data'])->user_id);
    }
}
