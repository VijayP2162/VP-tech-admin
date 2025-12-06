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
        Schema::create('quotation_master', function (Blueprint $table) {
            $table->id();
            $table->string('quatation_id')->unique();
            $table->string('service_provide');
            $table->date('end_date');
            $table->string('organization');
            $table->string('quatation_amount');
            $table->string('quatation_status');
            $table->string('verification_status');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation_master');
    }
};
