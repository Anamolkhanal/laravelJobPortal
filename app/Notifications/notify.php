<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class notify extends Notification
{
    public $job_title, $seeker_name, $notification_type;
    use Queueable;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($job_title,$seeker_name,$notification_type)
    {
        $this->job_title = $job_title;
        $this->seeker_name =$seeker_name;
        $this->notification_type=$notification_type; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
        
        $job_title=$this->job_title;
        $seeker_name=$this->seeker_name; 
        $notification_type=$this->notification_type;
        if($notification_type=="apply"){
        return [
            'data'=>$seeker_name." applied for ".$job_title,
        ];
        }
        else{
            return [
                'data'=>$seeker_name." cancel application for ".$job_title,
            ];
        }
    }
}

