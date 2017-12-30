<?php

namespace SalesProgram\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use SalesProgram\Permission;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'SalesProgram\Model' => 'SalesProgram\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        foreach ($this->getPermissions() as $permission) {

            $gate->define($permission->name, function ($user) use ($permission) {

                return $user->hasRole($permission->roles);
            });

//            if ($gate->define($permission->name, function ($user) use ($permission)
//
//                { return $user->hasRole($permission->roles);
//
//                })){
//
//
//            }



        }

    }

        protected function getPermissions()
        {

            return Permission::with('roles')->get();

        }

}
