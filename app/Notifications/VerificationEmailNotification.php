<?php

namespace App\Notifications;

use Ichtrojan\Otp\Models\Otp as ModelsOtp;
use Ichtrojan\Otp\Otp as OtpOtp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerificationEmailNotification extends Notification
{
    use Queueable;
    public $message;
    public $subject;
    public $fromEmail;
    public $mailer;
    public $otp;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message  = "Use Code for Varification Email to reset password";
        $this->subject = "Verification needed to reset password";
        $this->fromEmail = "yallaOrder@allsafe.com";
        $this->mailer = "smtp";
        $this->otp = new OtpOtp;
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
        $otp = $this->otp->generate($notifiable->email,'numeric',4,60);
        return (new MailMessage)
            ->mailer('smtp')
            ->from($notifiable->email, $notifiable->name) // Add the sender information here
            ->subject($this->subject)
            ->greeting('Hello'."".$notifiable->name)
            ->line($this->message)
            ->line('code:'.$otp->token);
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
