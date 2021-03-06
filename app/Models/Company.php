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
        'address',
        'user_type',
        'position',
    ];
    public function jobs(){
        return $this->hasMany('App\Models\Job'); 
    }
    public function getRouteKeyName()
    {
        return 'cname';
    }
}