<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->string('designation', 50);
            $table->string('organization', 50);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description', 50);

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
        Schema::dropIfExists('experiences');
    }
}
