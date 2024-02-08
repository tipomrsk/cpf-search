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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->uuid('company_id');
            $table->uuid('sender_id');
            $table->uuid('receiver_id');
            $table->string('volume');
            $table->timestamps();

            $table->foreign('company_id')->references('uuid')->on('companies');
            $table->foreign('sender_id')->references('uuid')->on('senders');
            $table->foreign('receiver_id')->references('uuid')->on('receivers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
