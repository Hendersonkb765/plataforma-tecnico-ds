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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->date('expiration_date');
            $table->integer('max_grade');
            $table->integer('max_score');
            $table->string('link')->nullable();
            $table->foreignId('discipline_id')->constrained();
            $table->foreignId('teacher_id')->constrained('users','id');
            $table->timestamps();
        });

        Schema::create('student_activities', function (Blueprint $table){
            $table->id();
            $table->float('grade');
            $table->integer('score');
            $table->string('attachment')->nullable();
            $table->foreignId('activity_id')->constrained();
            $table->foreignId('student_id')->constrained('users','id');
            $table->timestamps();

        });
        
        Schema::create('image_activities', function (Blueprint $table){

            $table->id();
            $table->foreignId('activity_id')->constrained('activities','id');
            $table->string('title')->nullable();
            $table->string('url');
            $table->timestamps();

        });
        /*
        Schema::create('essay_answers', function (Blueprint $table){
            $table->id();
            $table->string('question');
            $table->string('response');
        });

        Schema::create('activity_questions',function(Blueprint $table){
            $table->id();
            $table->string('question');
            $table->string('response');
            $table->boolean('correct');
            $table->foreignId('activity_id')->constrained();
        });
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
