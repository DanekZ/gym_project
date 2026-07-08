<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipPlanController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(MemberController::class)->group(function () {
    Route::get('/', 'index')->name('member_index');
    Route::get('/member/create', 'create');
    Route::post('/member/store', 'store');
})->middleware(['auth', 'verified']);


Route::controller(MembershipPlanController::class)->group(function () {
    Route::get('/membership_plan', 'index')->name('membership_plan');
    Route::get('/membership_plan/create', 'create');
    Route::post('/membership_plan/store', 'store');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';