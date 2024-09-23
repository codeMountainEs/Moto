<?php

namespace App\Listeners;

use App\Events\MotoCreated;
use App\Models\User;
use App\Notifications\NewMoto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMotoCreatedNotifications implements ShouldQueue
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
    public function handle(MotoCreated $event): void
    {
        foreach (User::whereNot('id', $event->moto->user_id)->cursor() as $user) {
            $user->notify(new NewMoto($event->moto));
        }
    }
}
