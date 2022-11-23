<?php

namespace App\Providers;

use App\Events\ReactionEvent;
use App\Models\Crisis;
use App\Models\Participant;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\TimelinePost;
use App\Observers\CrisisObserver;
use App\Observers\ParticipantObserver;
use App\Observers\PostObserver;
use App\Observers\ReactionObserver;
use App\Observers\TimelinePostsObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Reaction::observe(ReactionObserver::class);
        Post::observe(PostObserver::class);
        Participant::observe(ParticipantObserver::class);
        TimelinePost::observe(TimelinePostsObserver::class);
        Crisis::observe(CrisisObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
