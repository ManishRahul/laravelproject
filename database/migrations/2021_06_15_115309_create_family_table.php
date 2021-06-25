<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->char('name', 100);
            $table->char('relation', 50);
            $table->integer('age');
            $table->string('job');

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
        Schema::dropIfExists('family');
    }
}
