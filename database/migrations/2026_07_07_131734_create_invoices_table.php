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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');

            $table->foreign('member_id')->references('id')->on('members');
            $table->string('invoice_number', 18);
            $table->integer('period_month');
            $table->integer('period_year');
            $table->decimal('amount', 8, 2);
            $table->decimal('taxt', 3, 2);
            $table->decimal('total', 8, 2);
            $table->enum('status', ['unpaid', 'paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};