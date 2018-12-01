<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    protected $fillable = ['day', 'date', 'description', 'startHour', 'endHour', 'result', 'tdl_id', 'user_id'];
}
