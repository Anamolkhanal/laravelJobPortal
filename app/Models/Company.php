<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory;
    protected $guarded = [];


    protected $fillable = [
        'user_id',
        'cname',
        'email',
        'password',
<<<<<<< HEAD
        'address',
=======
        'user_type',
        'position',
>>>>>>> 3a2c39a6706f8281376a9b30e404938e890c2360
    ];
    public function jobs(){
        return $this->hasMany('App\Models\Jobs'); 
    }
    public function getRouteKeyName()
    {
        return 'cname';
    }
}