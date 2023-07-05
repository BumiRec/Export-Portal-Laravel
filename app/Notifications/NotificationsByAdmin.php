<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NotificationsByAdmin extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $product;
    public $company;
    public function __construct($product, $company)
    {
        $this->product = $product;
        $this->company = $company;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [
            'notifiable_id' => $notifiable->id,
            'Company'       => $this->company ?? 'N/A',
            'Product'       => $this->product['name'] ?? 'N/A',
        ];
    }
}
