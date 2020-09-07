<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingdocument', function (Blueprint $table) {
            $table->id();
            $table->integer('trainingID')->unsigned()->default(10);
            $table->string('patch', 200);
            $table->string('fileName', 200);
            $table->string('extension', 200);
            $table->string('createdBy', 200);
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
        Schema::dropIfExists('training_documents');
    }
}
