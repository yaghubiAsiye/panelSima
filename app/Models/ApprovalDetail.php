<?php

namespace App\Models;

use App\User;
use App\Models\Approval;
use Illuminate\Database\Eloquent\Model;

class ApprovalDetail extends Model
{
    protected $guarded = [];
    public function approval()
    {
        return $this->belongsTo(Approval::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'approval_detail_users')->withPivot('sender_id', 'id', 'sender_status','receiver_status', 'sender_result', 'receiver_result', 'receiver_attachment');
    }
    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'sender_id');
    // }


}
