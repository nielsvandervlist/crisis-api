<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class ReactionCreated extends Notification implements ShouldQueue
{
    //TODO add redis as database for queue
    use Queueable;

    public $reaction;

    /**
     * @param $reaction
     */
    public function __construct($reaction)
    {
        $this->reaction = $reaction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }

    /**
     * @param $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'reaction' => $this->reaction->id,
        ]);
    }
}
