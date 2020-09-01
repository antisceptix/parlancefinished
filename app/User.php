<?php

namespace App;


use App\Students;
use App\Classes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Database\Eloquent\Model;




class User extends Authenticatable
{
    use Notifiable, HasRoles, Messagable;


   public function Students()
    {
        return $this->belongsToMany(Students::class)->withTimestamps();
    }

    public function Classes()
    {
        return $this->belongsToMany(Classes::class)->withTimestamps();
    }

    protected $table = 'users';
    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }
}
