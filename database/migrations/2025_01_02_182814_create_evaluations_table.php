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
            $table->decimal('generalAppearance', 4, 2);
            $table->decimal('attendance', 4, 2);
            $table->decimal('honesty', 4, 2);
            $table->decimal('cooperation', 4, 2);
            $table->decimal('initiative', 4, 2);
            $table->decimal('dependability', 4, 2);
            $table->decimal('tact', 4, 2);
            $table->decimal('accuracy', 4, 2);
            $table->decimal('cleanliness', 4, 2);
            $table->decimal('safety', 4, 2);
            $table->decimal('toolUsage', 4, 2);
            $table->decimal('shopCondition', 4, 2);
            $table->decimal('supervisorRelation', 4, 2);
            $table->decimal('workerRelation', 4, 2);
            $table->decimal('studentRelation', 4, 2);

            /**
             * Abbrevation Legends:
             * pa - Personal Attittudes
             * sm - Shop Management
             * hrs - Human Relation Skills
             */
            $table->string('evaluation');
            // $table->decimal('pa_average', 4, 2);
            // $table->decimal('sm_average', 4, 2);
            // $table->decimal('hrs_average', 4, 2);
            $table->decimal('total_average', 4, 2);
            $table->text('description');
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
