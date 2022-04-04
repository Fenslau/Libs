<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use \BeyondCode\LaravelWebSockets\Events\UnsubscribedFromChannel;
use \BeyondCode\LaravelWebSockets\Events\SubscribedToChannel;
use \BeyondCode\LaravelWebSockets\Events\NewConnection;
use \BeyondCode\LaravelWebSockets\Events\ConnectionClosed;
use \BeyondCode\LaravelWebSockets\Events\WebSocketMessageReceived;
use \App\Listeners\HandleSubscribedToChannel;
use \App\Listeners\HandleUnsubscribedFromChannel;
use \App\Listeners\HandleNewConnection;
use \App\Listeners\HandleConnectionClosed;
use \App\Listeners\HandleWebSocketMessageReceived;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SubscribedToChannel::class => [
            HandleSubscribedToChannel::class,
        ],
        UnsubscribedFromChannel::class => [
            HandleUnsubscribedFromChannel::class,
        ],
        NewConnection::class => [
            HandleNewConnection::class,
        ],
        ConnectionClosed::class => [
            HandleConnectionClosed::class,
        ],
        WebSocketMessageReceived::class => [
            HandleWebSocketMessageReceived::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
