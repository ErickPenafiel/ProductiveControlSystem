<?php

namespace App\Notifications;

use App\Models\Fermentacion;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TemperaturaFermentacionNotification extends Notification
{
    use Queueable;

    public $temperatura;

    /**
     * Create a new notification instance.
     */
    public function __construct(Fermentacion $temperatura)
    {
        //
        $this->temperatura = $temperatura;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
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
            'categoria' => 'Temperatura de fermentacion',
            'temperatura' => $this->temperatura->temperatura,
            'fechaRegistro' => $this->temperatura->created_at->format('d-m-Y'),
            'horaRegistro' => $this->temperatura->created_at->format('H:i:s'),
            'fecha' => Carbon::now()->diffForHumans(),
        ];
    }
}
