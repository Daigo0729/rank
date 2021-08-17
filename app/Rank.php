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
    'destroy'
];
    public function getPaginateByLimit(int $limit_count = 10)
{
    
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
    public function selects()
    {
        return $this->hasMany('App\Select');        //1対多の関係
    }

    
}
