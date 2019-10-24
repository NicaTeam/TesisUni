<?php

namespace SalesProgram;


use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = ['company', 'roles'];


    public function articles(){


        return $this->hasMany('SalesProgram\Article');
    }

    public function orders(){

        return $this->hasMany(Order::class);
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


//     public function roles()
//     {

//         return $this->belongsToMany(Role::class);

//     }


//     public function hasRole($role)
//     {

//         if (is_string($role)){

//             return $this->roles->contains('name', $role);
//         }

//         return !! $role->intersect($this->roles)->count();

// //        foreach($role as $r)
// //        {
// //            if ($this-> hasRole ($r->name)) {
// //                return true;
// //            }
// //        }
// //
// //        return false;
//     }

    public function company(){

        return $this->belongsTo(Company::class);
    }


    public function add($request)
    {

         return $this->create([

            'name' => $request->get('name'),
            'email'=> $request->get('email'),
            'password'=> bcrypt($request->get('password')),
            'company_id'=>$request->get('company_id'),

        ]);

    }


   public function scopeFilter($query, $filters)
   {

        // dd($query->toSql());

        return $filters->apply($query);

   }
}
