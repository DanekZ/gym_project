<?php

namespace App\Http\Controllers;

use App\Models\MembershipPlan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Invoice;

class MemberController extends Controller
{
    public function index()
    {
        return view('auth.member.index');
    }

    public function create()
    {
        $member_plan_data = MembershipPlan::all();

        return view('auth.member.create', ['member_plan_data' => $member_plan_data]);
    }

    public function store(Request $request)
    {

        $member_plan_id = $request->member_id;
        $name = $request->name;
        $phone = $request->phone;
        $address = Carbon::parse($request->join_date);
        $join_date = $request->join_date;
        $active_until = $join_date->copy->addMonth();
        $status = $request->status;


        $month = $address->month;
        $year = $address->year;
        $invoice = Invoice::generateInvoice($request->member_id, $bulan, $tahun);

        dd($invoice);
    }
}