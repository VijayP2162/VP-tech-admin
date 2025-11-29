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
        Schema::create('booking_master', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_seat_no');
            $table->string('customer_mobile');
            $table->string('customer_booking_date');
            $table->string('customer_confirm_code');
            $table->string('verfication_code')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('booking_master', function (Blueprint $table) {
        $table->date('customer_booking_date')->change();
    });
    }
};
