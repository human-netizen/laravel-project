<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('to_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('from_id')->constrained('users')->onDelete('cascade'); 
            $table->longText('problem_name');
            $table->string('contest_id');
            $table->string('index');
            $table->boolean('is_read')->default(false);
            $table->integer('battle_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
