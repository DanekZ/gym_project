<?php

namespace App\Models;

use App\Models\Invoice;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;


class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'member_id',
        'amount',
        'taxt',
        'status'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'period_month' => 'integer',
        'period_year' => 'integer',
        'total' => 'decimal:2',
        'tax' => 'decimal:2'
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public static function generateInvoice($member_id, $month, $year)
    {

        $invoice = Invoice::where('member_id', $member_id)
            ->where('period_month', $month)
            ->where('period_year', $year)
            ->first();

        if ($invoice) {
            return null;
        }
        $member_plan = MembershipPlan::where('id', $member_id)->first();

        $result = DB::transaction(function () use ($member_plan, $month, $year) {
            $amount = $member_plan->monthly_price;
            $tax = 0.11;
            $total = $amount * $tax;

            $last = Invoice::where('period_month', $month)
                ->where('period_year', $year)
                ->first();


            dd($last);
        });





        // return $invoice;
    }
}