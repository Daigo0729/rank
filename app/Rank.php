<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rank extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'user_id',
];
    public function getPaginateByLimit(int $limit_count = 5)
{
    
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
    public function selects()
    {
        return $this->hasMany('App\Select');        //1対多の関係
    }
    

    
}
