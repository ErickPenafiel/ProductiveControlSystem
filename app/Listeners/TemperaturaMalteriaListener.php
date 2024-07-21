<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\TemperaturaNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class TemperaturaMalteriaListener
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
    public function handle(object $event): void
    {
        //
        User::all()->each(function (User $user) use ($event) {
            Notification::send($user, new TemperaturaNotification($event->temperatura));
        });
    }
}
