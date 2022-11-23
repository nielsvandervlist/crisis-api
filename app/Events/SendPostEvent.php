<?php

namespace App\Events;

use App\Models\Post;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendPostEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public Post $post;

    /**
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->user = User::find($post->user_id);
        $this->post = $post;
    }

    /**
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'title' => $this->post->title,
            'description' => $this->post->description,
//            'src' => $this->post->post_type_id,
            'createdAt' => now()->toDateTimeString(),
        ];
    }

    /**
     * @return string
     */
    public function broadcastAs()
    {
        return 'timeline.post';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //TODO Public channel die naar alle participants gaat van de editor
        return new Channel('timeline-channel' . $this->user->id);
    }
}
