<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('staff_id');

            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('staff_id')->references('id')->on('users');

            $table->decimal('amount', 8, 2);
            $table->dateTime('paid_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};