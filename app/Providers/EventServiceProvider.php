<?php

namespace App\Providers;

use App\Events\TransactionCreated;
use App\Events\TransactionReceived;
use App\Listeners\AddTransactionToDB;
use App\Listeners\ParseTransaction;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TransactionReceived::class => [
            ParseTransaction::class,
        ],
        TransactionCreated::class => [
            AddTransactionToDB::class,
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
