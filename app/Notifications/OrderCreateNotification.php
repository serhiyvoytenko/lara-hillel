<?php

namespace App\Notifications;

use App\Mail\NewOrderForAdmin;
use App\Mail\NewOrderForCustomer;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class OrderCreateNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        protected User $user,
        protected int  $orderId
    )
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'telegram',];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
//     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(mixed $notifiable): NewOrderForCustomer|NewOrderForAdmin
    {

        $notification = isAdmin($this->user->id) ? NewOrderForAdmin::class : NewOrderForCustomer::class;

        return (new $notification($this->orderId, $this->user->full_name))->to($this->user);
    }

    public function toTelegram(mixed $notifiable): TelegramMessage
    {
        logs()->debug(__CLASS__ . ' ' .$this->user->telegram_id);
        return TelegramMessage::create()
            ->to($this->user->telegram_id)
            ->content("Hello there!\nYour invoice has been *PAID*");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
