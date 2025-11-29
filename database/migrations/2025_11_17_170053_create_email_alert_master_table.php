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
        Schema::create('email_alert_master', function (Blueprint $table) {
            $table->id();
            $table->string('send_email');
            $table->string('to_email');
            $table->string('message');
            $table->integer('view_notification');
            $table->date('delivery_date');
            $table->integer('verification_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_alert_master');
    }
};
