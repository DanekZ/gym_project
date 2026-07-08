<?php

namespace App\Http\Controllers;

use App\Models\MembershipPlan;
use Illuminate\Http\Request;

class MembershipPlanController extends Controller
{
    public function index(Request $request)
    {
        $data = MembershipPlan::all();

        return view('auth.membership_plan.index', [
            'datas' => $data
        ]);
    }

    public function create(Request $request)
    {
        return view('auth.membership_plan.create');
    }

    public function store(Request $request)
    {

        $membershipPlan = MembershipPlan::create([
            'name' => $request->name,
            'description' => $request->description,
            'monthly_price' => $request->monthly_price
        ]);

        $membershipPlan->save();

        return redirect('/membership_plan');
    }
}