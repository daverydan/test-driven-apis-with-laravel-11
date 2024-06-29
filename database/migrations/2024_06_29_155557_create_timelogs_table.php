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
        Schema::disableForeignKeyConstraints();

        Schema::create('timelogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->dateTime('started_at');
            $table->dateTime('stopped_at');
            $table->unsignedInteger('minutes');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timelogs');
    }
};
