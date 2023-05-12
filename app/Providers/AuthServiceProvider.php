<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Comment;
use App\Models\Film;
use App\Policies\CommentPolicy;
use App\Policies\FilmPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Comment::class => CommentPolicy::class,
        Film::class => FilmPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
