<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public function score(){
        return $this->belongsTo('App\Model\Score','score_id','id');
    }
}
