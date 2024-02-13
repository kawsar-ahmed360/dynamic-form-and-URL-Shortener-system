<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadioGroupYesNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radio_group_yes_nos', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->nullable();
            $table->integer('field_id')->nullable();
            $table->string('person_no')->nullable();
            $table->string('person_amount')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('radio_group_yes_nos');
    }
}
