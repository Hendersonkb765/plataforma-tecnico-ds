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
        Schema::create('multidisciplinary_activity', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('max_grade');
            $table->integer('max_score');
            $table->string('link');

            $table->timestamps();
        });
        Schema::create('class_multidisciplinary_activity', function(Blueprint $table){
            $table->foreignId('class_id');
            $table->foreignId('discipline_id');
        });
        
        Schema::create('student_multidisciplinary_activity', function (Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('multidisciplinary_id')->constrained('multidisciplinary_activity','id');
            $table->integer('grade');
            $table->integer('score');
            $table->string('attachment')->nullable();
            $table->date('delivery_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multidisciplinary_activity');
    }
};
