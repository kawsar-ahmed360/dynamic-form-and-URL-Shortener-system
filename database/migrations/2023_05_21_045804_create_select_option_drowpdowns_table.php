<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectOptionDrowpdownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('select_option_drowpdowns', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->nullable();
            $table->integer('field_id')->nullable();
            $table->string('option_value')->nullable();
            // $table->string('person_amount')->nullable();
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
        Schema::dropIfExists('select_option_drowpdowns');
    }
}
