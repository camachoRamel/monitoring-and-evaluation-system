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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stud_id')->unsigned();
            $table->bigInteger('hte_id')->unsigned();
            /**
             * Abbrevation Legends:
             * pa - Personal Attittudes
             * sm - Shop Management
             * hrs - Human Relation Skills
             */
            $table->decimal('pa_average', 4, 2);
            $table->decimal('sm_average', 4, 2);
            $table->decimal('hrs_average', 4, 2);
            $table->decimal('total_average', 4, 2);
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
        Schema::dropIfExists('evaluations');
    }
};
