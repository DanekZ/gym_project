<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    protected $table  = 'members';
    protected $fillable = [
        'membership_plan_id',
        'name',
        'phone',
        'address',
        'join_date',
        'active_until',
        'status'
    ];

    public function membership_plan(): BelongsTo
    {
        return $this->belongsTo(MembershipPlan::class);
    }
}