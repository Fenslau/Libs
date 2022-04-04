<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use \App\Models\User;
use Illuminate\Support\Facades\Log;

class HandleSubscribedToChannel
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
        User::findOrFail(json_decode(json_encode($event->user))->user_id)->fill(['online' => 1])->save();
      }
    }
}
