<?php

namespace SalesProgram;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function articles(){


        return $this->hasMany('SalesProgram\Article');
    }

    public function registration(){


        return $this->hasMany(PriceRegistration::class);
    }

    public function isATeamManager(){

        return true;
    }

    public function publish(Article $article){

        $this->articles()->save($article);

        return $article;

    }


    public function addRegister(PriceRegistration $priceRegistration){

        $this->registration()->save($priceRegistration);

        return $priceRegistration;

    }


    public function roles()
    {

        return $this->belongsToMany(Role::class);

    }


    public function hasRole($role)
    {

        if (is_string($role)){

            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();

//        foreach($role as $r)
//        {
//            if ($this-> hasRole ($r->name)) {
//                return true;
//            }
//        }
//
//        return false;
    }
}
