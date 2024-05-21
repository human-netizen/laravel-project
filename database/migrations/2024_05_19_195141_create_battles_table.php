<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBattlesTable extends Migration
{
    public function up()
    {
        Schema::create('battles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user1_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user2_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->integer('contest_id');
            $table->string('problem_index');
            $table->integer('duration')->default(5); // Duration in minutes
            $table->timestamp('start_time')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected', 'done'])->default('pending');
            $table->string('user1_submission_id')->nullable();
            $table->string('user2_submission_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('battles');
    }
}
