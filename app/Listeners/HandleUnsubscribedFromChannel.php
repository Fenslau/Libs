<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use \App\Models\User;

class HandleUnsubscribedFromChannel
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
        if ($event->channelName == 'presence-presence' AND $event->user) {
          User::findOrFail(json_decode(json_encode($event->user))->user_id)->fill(['online' => 0])->save();
        }
    }
}
