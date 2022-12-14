<?php

namespace App\Models;

use App\Models\ApprovalDetail;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $guarded = [];
    public function approvalDetails()
    {
        return $this->hasMany(ApprovalDetail::class);
        }

}
