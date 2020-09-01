<?php

namespace App;


use App\User;
use App\Students;
use Illuminate\Database\Eloquent\Model;



class students extends Model
{
    public function User()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function Classes()
    {
        return $this->belongsToMany(Classes::class)->withTimestamps();
    }

    protected $fillable = [
        'student_name'
    ];
    protected $table = 'students';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
