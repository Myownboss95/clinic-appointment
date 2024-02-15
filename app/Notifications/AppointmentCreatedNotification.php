<?php

namespace App\Notifications;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public User $admin, public User $user, public Appointment $appointment, public string $date)
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
            ->subject('Appointment Booked')
            ->greeting("Hello {$this->admin->first_name}")
            ->line("Appointment booked for: {$this->appointment->subService()->first()->name}, {$this->date} has been created fot client: {$this->user->first_name} {$this->user->last_name}")
            ->line("It's in {$this->appointment->stage->name} stage.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'email' => $this->toMail($notifiable)->toArray(),
        ];
    }
}
