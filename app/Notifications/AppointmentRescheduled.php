<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentRescheduled extends Notification
{
    use Queueable;
    protected $appointment;

    /**
     * Create a new notification instance.
     */
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        // return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Appointment Rescheduled')
                    ->line('Your appointment withDr.'.$this->appointment->doctor->user->name.' has been rescheduled.')
                    ->line('New Dare:'.$this->appointment->date_time)
                    //->line('New Time:'.$this->appointment->time)
                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
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
            'appointment_id'=>$this->appointment->id,
            'appointment_date_time'=>$this->appointment->date_time,
            'doctor_name'=>$this->appointment->doctor->user->name,
            //
        ];
    }
}
