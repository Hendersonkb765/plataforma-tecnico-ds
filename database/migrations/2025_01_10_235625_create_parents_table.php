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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nickname');
            $table->string('password');
            $table->string('cell_phone');
            $table->foreignId('responsible_for')->constrained('users','id');
            $table->timestamps();
        });

        Schema::create('parent_user', function (Blueprint $table){
            $table->foreignId('parent_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
