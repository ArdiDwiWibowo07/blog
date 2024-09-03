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
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('username', 45)->primary(); // VARCHAR(45) and primary key
            $table->string('password', 250); // VARCHAR(250)
            $table->string('name', 45); // VARCHAR(45)
            $table->string('role', 45); // VARCHAR(45)
            $table->timestamps();
            // Set the table engine
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
