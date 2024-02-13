<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_fields', function (Blueprint $table) {
            $table->id();
            $table->text('field_name')->nullable();
            $table->text('field_value')->nullable();
            $table->text('field_placeholder')->nullable();
            $table->integer('event_id')->nullable();
            $table->string('status')->nullable();
            $table->string('radio_button_yes_no_person_no')->nullable();
            $table->string('required')->nullable();
            $table->integer('sequence')->nullable();
            $table->string('radio_button_yes')->nullable();
            $table->string('radio_button_no')->nullable();
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
        Schema::dropIfExists('dynamic_fields');
    }
}
