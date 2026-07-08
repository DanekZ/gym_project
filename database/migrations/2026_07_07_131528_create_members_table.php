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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            // membuat kolom membership_plan_id dulu
            $table->unsignedBigInteger('membership_plan_id');
            $table->foreign('membership_plan_id')->references('id')->on('membership_plans');
            $table->string('name');
            $table->string('phone', 15);
            $table->string('address', 255);
            $table->date('join_date');
            $table->date('active_until');
            $table->enum('status', ['active', 'suspend']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};