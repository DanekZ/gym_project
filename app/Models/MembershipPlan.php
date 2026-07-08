<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MembershipPlan extends Model
{
    protected $table = 'membership_plans';

    protected $fillable = [
        "name",
        "description",
        "monthly_price"
    ];

    protected $casts = [
        'monthly_price' => 'decimal:2'
    ];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
}