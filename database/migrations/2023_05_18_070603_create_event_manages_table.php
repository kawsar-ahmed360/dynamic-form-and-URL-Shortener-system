<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_manages', function (Blueprint $table) {
            $table->id();
            $table->string('event_name')->nullable();
            $table->text('short')->nullable();
            $table->string('dynamic_table')->nullable();
            $table->string('status')->default(1);
            $table->string('trash')->default(1);
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
        Schema::dropIfExists('event_manages');
    }
}
