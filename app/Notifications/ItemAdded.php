<?php

namespace App\Notifications;

use App\Models\store;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ItemAdded extends Notification
{
    use Queueable;


    protected $added;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(store $added)
    {
        $this->added=$added;
    }

    public function via($notifiable)
    {
        return ['database'];
    }



    public function toDatabase($notifiable)
    {
        return [

            //'data' => $this->details['body']
            'id'=> $this->added->id,
            'title'=>'New Item Added :',
            'user'=> Auth::user()->name,

        ];
    }
}
