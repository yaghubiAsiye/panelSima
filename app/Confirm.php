<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    protected $guarded = [];
    public function confirmable() {
        return $this->morphTo();
    }
}
