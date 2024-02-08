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
        Schema::table('orders', function(Blueprint $table)
        {
            $table->index('uuid');
        });

        Schema::table('receivers', function(Blueprint $table)
        {
            $table->index('uuid');
            $table->index('cpf');
        });

        Schema::table('companies', function(Blueprint $table)
        {
            $table->index('uuid');
        });

        Schema::table('senders', function(Blueprint $table)
        {
            $table->index('uuid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
