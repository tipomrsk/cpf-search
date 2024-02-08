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
            $table->unsignedBigInteger('companies_id');
            $table->unsignedBigInteger('senders_id');
            $table->unsignedBigInteger('receivers_id');
            $table->string('volume');
            $table->timestamps();

            $table->foreign('companies_id')->references('id')->on('companies');
            $table->foreign('senders_id')->references('id')->on('senders');
            $table->foreign('receivers_id')->references('id')->on('receivers');
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
