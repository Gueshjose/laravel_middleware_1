<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('check-user',function($user,$id, $roleId)
        {
            return ($user->role_id != $roleId || $user->id == $id);
        });

        Gate::define('admin-user',function($user,$roleId)
        {    
            $request = resolve(\Illuminate\Http\Request::class);
            if($user->role_id === 1){
                return ($user->role_id != $roleId || $request->path()=='/user/{id}/edit');
            }else{
                return ($roleId !== 1 && $roleId !== 2 );
            }
        });
    }
}
