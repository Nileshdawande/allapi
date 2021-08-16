<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // \App\Events\ExampleEvent::class => [
        //     \App\Listeners\ExampleListener::class,
        // ],

        \App\Events\Contactadded::class => [
           \App\Listeners\ContactaddedListener::class,
       ],

        \App\Events\Contactaddededu::class => [
           \App\Listeners\ContactaddededuListener::class,
       ],

    ];
}
