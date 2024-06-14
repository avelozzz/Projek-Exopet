<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExopetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exopet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ownerName', 100);
            $table->string('animalType', 50);   
            $table->string('animalAge', 10);
            $table->string('animalPrice', 10);
            $table->string('location', 100);
            $table->string('picture', 300);
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
        Schema::dropIfExists('exopet');
    }
}
