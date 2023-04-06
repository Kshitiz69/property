<?php

namespace App\Notifications;

use App\Models\Listing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;
    public $user, $property, $recipient;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @param $property
     * @param $recipient
     */
    public function __construct($user, Listing $property, $recipient)
    {
        $this->user = $user;
        $this->property = $property;
        $this->recipient = $recipient;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->subject('Property Contact')->markdown('mail.contact.mail', ['user' => $this->user, 'property'=> $this->property, 'recipient' => $this->recipient, 'url' => route('listings.show', $this->property->id)]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
