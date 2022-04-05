<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommissionMajor extends Model
{
    protected $guarded = [];
    public function confirms() {
        return $this->morphMany('App/Confirm' , 'confirmable');
    }
}
