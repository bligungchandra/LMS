<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('trainingID');
            $table->dateTime('trainingDate');
            $table->string('trainingTitle', 50);
            $table->longText('trainingDescription');
            $table->string('trainingGoals', 50);
            $table->string('trainer', 15);
            $table->longText('trainingDocument');
            $table->string('createdBy', 15);
            $table->softDeletes();
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
        Schema::dropIfExists('trainings');
    }
}
