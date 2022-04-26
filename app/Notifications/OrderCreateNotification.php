<?php

namespace App\Notifications;

use App\Mail\NewOrderForAdmin;
use App\Mail\NewOrderForCustomer;
use App\Models\User;
use App\Services\AwsPublicLink;
use App\Services\Contracts\AwsPublicLinkInterface;
use App\Services\Contracts\InvoicesServiceInterface;
use App\Services\InvoicesService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;
use NotificationChannels\Telegram\TelegramFile;
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
     * //     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(mixed $notifiable): NewOrderForCustomer|NewOrderForAdmin
    {
        $notification = isAdmin($this->user->id) ? NewOrderForAdmin::class : NewOrderForCustomer::class;

        return (new $notification($this->orderId, $this->user->full_name))->to($this->user);
    }

    /**
     * @throws BindingResolutionException
     */
    public function toTelegram(mixed $notifiable): TelegramFile
    {
        $awsPublicLink = app()->make(AwsPublicLink::class);
        $invoicesService = app()->make(InvoicesService::class);

        $invoice = $invoicesService->generate($notifiable)->save('s3');
        $link = $awsPublicLink->generate($invoice->filename);

//        logs()->info($notifiable->id);
//        logs()->info($invoice->filename);
//        logs()->info($link);

        $route = route('account.order.show', $notifiable);

        return TelegramFile::create()
            ->to($this->user->telegram_id)
            ->content("Hello there!\nYour invoice has been *PAID*")
            ->document($link, $invoice->filename)
            ->button('View order', $route);
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
