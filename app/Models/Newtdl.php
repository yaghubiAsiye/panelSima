<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Newtdl extends Model
{
    protected $guarded = [];
    public function users()
    {
        return $this->belongsToMany(User::class, 'newtdl_users')->withPivot('statusAssigner','result', 'attachment', 'id', 'status','descriptionAssigner');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getStatusButtonAttribute()
    {
        $color =
        [
            'برگشت خورده' => 'danger',
            'رد شده' => 'warning',
            'تایید شده'  => 'success',
            'متوقف'  => 'secondary',
            'بررسی نشده'  => 'info',
        ];
        return $color[$this->status];
    }
    public function getPriorityButtonAttribute()
    {
        $color =
        [
            'عادی'    => 'secondary',
            'متوسط' => 'info',
            'آنی'  => 'danger',
            'فوری'  => 'warning',
        ];
        return $color[$this->priority];
    }

    public function getstatusAssignerPivotAttribute()
    {
        $color =
        [
            'برگشت خورده' => 'danger',
            'رد شده' => 'warning',
            'تایید شده'  => 'success',
            'متوقف'  => 'secondary',
            'بررسی نشده'  => 'info',
        ];
        return $color[$this->pivot->statusAssigner];
    }

    public function getstatusPivotAttribute()
    {
        $color =
        [
            'بررسی نشده' => 'warning',
            'درحال انجام' => 'primary',
            'انجام شده'  => 'success',
            'متوقف'  => 'danger',
        ];
        return $color[$this->pivot->status];
    }

}
