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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('idpost');
            $table->text('title');
            $table->text('content');
            $table->dateTime('date');
            $table->string('username', 45);

            $table->foreign('username')
                  ->references('username')
                  ->on('accounts')
                  ->onDelete('cascade'); // Optional: specify action on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
