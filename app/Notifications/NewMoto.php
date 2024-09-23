<?php

namespace App\Notifications;

use App\Models\Moto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class NewMoto extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Moto $moto)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->subject("Nueva Moto de  {$this->moto->user->name}")
                    ->greeting("Nueva Moto de {$this->moto->user->name}")
                    ->line(Str::limit($this->moto->matricula, 50))
                    ->action('Acceso a Moto', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
