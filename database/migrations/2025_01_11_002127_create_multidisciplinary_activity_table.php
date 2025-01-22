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
        Schema::create('multidisciplinary_activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('max_grade');
            $table->integer('max_score');
            $table->date('delivery_date');
            $table->timestamps();
        });
        Schema::create('cohort_multidisciplinary_activity', function(Blueprint $table){
            $table->foreignId('cohort_id')->constrained();
            $table->foreignId('multidisciplinary_activity_id');
        });
        
        Schema::create('student_multidisciplinary_activities', function (Blueprint $table){
            $table->id();
            $table->foreignId('student_id')->constrained('users','id');
            $table->foreignId('multidisciplinary_activity_id');
            $table->integer('grade');
            $table->integer('score');
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_multidisciplinary_activities');
        Schema::dropIfExists('cohort_multidisciplinary_activity');
        Schema::dropIfExists('multidisciplinary_activities');
    }
};
