<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaceHuntedBangladeshEventTable extends Migration
{
    public function up()
    {
        Schema::create('Face_Hunted_Bangladesh_Event', function (Blueprint $table) {
            $table->increments('id');
            $table->text('your_name');
$table->text('email_address');
$table->text('city');
$table->text('RadioGroupOnly_gender');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Face_Hunted_Bangladesh_Event');
    }
}