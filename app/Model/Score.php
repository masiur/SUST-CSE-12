<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'score';

    public function review(){
        return $this->hasMany('App\Model\Review','score_id','id');
    }
}
