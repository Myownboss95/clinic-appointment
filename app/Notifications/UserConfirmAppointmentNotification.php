<?php

namespace App\Notifications;

use App\Models\GeneralSetting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserConfirmAppointmentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public User $user, public GeneralSetting $generalSetting)
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
            ->subject('Appointment Confirmed')
            ->greeting("Hello {$this->user->first_name}")
            ->line('Thank you for booking and confirming payment. An admin will contact you shortly')
            ->line('You can proceed to login with the following')
            ->action('Click here to book again', url('/login'))
            ->action('Click to Chat with Admin', url($this->generalSetting->whatsapp_contact) )
            ->line('Thank you for your patronage!');
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
