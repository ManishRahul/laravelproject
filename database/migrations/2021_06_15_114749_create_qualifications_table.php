<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->string('degreetype', 50);
            $table->enum('pursuing',['yes','no']);
            $table->string('college', 50);
            $table->string('degree', 50);
            $table->string('stream', 50);
            $table->integer('performance');

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
        Schema::dropIfExists('qualifications');
    }
}
