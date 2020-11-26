<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'cname',
        'email',
        'password',
        'user_type',
    ];
    public function jobs(){
        return $this->hasMany('App\Models\Jobs'); 
    }
    public function getRouteKeyName()
    {
        return 'cname';
    }
}