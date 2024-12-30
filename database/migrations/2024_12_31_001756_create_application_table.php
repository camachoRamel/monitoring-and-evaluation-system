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
        Schema::create('application', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stud_id')->unsigned();
            $table->bigInteger('hte_id')->unsigned();
            $table->integer('declined')->unsigned()->default(0);
            $table->foreign('stud_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hte_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application');
    }
};
