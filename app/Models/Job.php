<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function profile(){
        return $this->belongsTo('App\Models\profile');
    }
    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
    public function user(){
        return $this->belongsToMany('App\Models\User')->WithPivot('user_id');
    }
    public function getRouteKeyName()
    {
        return 'roles';
    }
  
    
}