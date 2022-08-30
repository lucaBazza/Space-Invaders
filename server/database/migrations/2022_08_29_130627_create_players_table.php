<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->bigInteger('alienKilledTotal');
            $table->bigInteger('bulletsFired');
            $table->bigInteger('deadsPlayer');
            $table->bigInteger('level');
            $table->bigInteger('highestScore');
            $table->bigInteger('globalPrecision');
            $table->bigInteger('timePlayedTotal');
            $table->bigInteger('sessionTotal');
            $table->string('userName');
            $table->longText('gameDataTime');
            $table->string('gameVersion');
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
        Schema::dropIfExists('players');
    }
};
