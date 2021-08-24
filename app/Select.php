<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Select extends Model
{
    
    use SoftDeletes;
    
       protected $fillable = [
    'name','rank_id','image_path'
];
    
    public function users()
        {
            return $this->belongsToMany('App\User');           //usersテーブルとの多対多の関係
        }
}
