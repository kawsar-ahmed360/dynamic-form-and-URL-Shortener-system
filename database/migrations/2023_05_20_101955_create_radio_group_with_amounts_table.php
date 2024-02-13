<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadioGroupWithAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radio_group_with_amounts', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->nullable();
            $table->integer('field_id')->nullable();
            $table->string('radio_field_name')->nullable();
            $table->string('radio_field_amount')->nullable();
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
        Schema::dropIfExists('radio_group_with_amounts');
    }
}
