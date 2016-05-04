<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate) {
        $this->registerPolicies($gate);

        $gate->define('update-article', function($user, $article) {
            return $user->id == $article->uid;
        });

        $gate->define('delete-article', function($user, $article) {
            if ($article->trashed() && ($user->id == $article->uid)) {
                return true;
            } else {
                return false;
            }
        });

        $gate->define('trash-article', function($user, $article) {
            if (!$article->trashed() && ($user->id == $article->uid)) {
                return true;
            } else {
                return false;
            }
        });

        $gate->define('restore-article', function($user, $article) {
            if ($article->trashed() && $user->id == $article->uid) {
                return true;
            } else {
                return false;
            }
        });
    }

}
