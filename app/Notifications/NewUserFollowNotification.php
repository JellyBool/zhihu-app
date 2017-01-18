<?php

namespace App\Notifications;

use App\Channels\SendcloudChannel;
use App\Mailer\UserMailer;
use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Naux\Mail\SendCloudTemplate;
use Mail;

/**
 * Class NewUserFollowNotification
 * @package App\Notifications
 */
class NewUserFollowNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database',SendcloudChannel::class];
    }

    /**
     * @param $notifiable
     */
    public function toSendcloud($notifiable)
    {
        (new UserMailer())->followNotifyEmail($notifiable->email);
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'name' => Auth::guard('api')->user()->name,

        ];
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
