<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public function Students()
    {
        return $this->belongsToMany(Students::class)->withTimestamps();
    }

    public function User()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    protected $fillable = [
        'classes_name'
    ];
    protected $table = 'classes';
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
