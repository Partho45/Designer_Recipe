<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewRecipeNotify extends Notification implements ShouldQueue
{
    use Queueable;

    public $recipe;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($recipe)
    {
        $this->recipe = $recipe;
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
        return (new MailMessage)
                    ->subject('New Design Available')
                    ->greeting('Dear, Subscriber')
                    ->line('There is a new design available here.')
                    ->line('Title:'.$this->recipe->title)
                    ->action('View', url(route('recipe.details',$this->recipe->slug)))
                    ->line('Thank you for using our application!');
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
