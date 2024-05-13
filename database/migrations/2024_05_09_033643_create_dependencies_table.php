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
        Schema::create('dependencies', function (Blueprint $table) {
            $table->BigInteger('preceding_task_id');
            $table->BigInteger('following_task_id');
            $table->foreign('preceding_task_id')->references('id')->on('tasks');
            $table->foreign('following_task_id')->references('id')->on('tasks');
            $table->primary(['preceding_task_id', 'following_task_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependencies');
    }
};
