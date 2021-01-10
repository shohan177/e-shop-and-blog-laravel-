<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_name') -> default('logo.png');
            $table->string('stkie_logo_name') -> default('stkie_logo.png');
            $table->string('logo_width') -> default('100px');
            $table->string('stike_logo_width') -> default('100px');
            $table->string('fav_icon') -> nullable();
            $table->string('crt') -> default('2021 @ shohan');
            $table->string('social') -> nullable();
            $table->string('clients') -> nullable();
            $table->string('feed_back') -> nullable();
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
        Schema::dropIfExists('settings');
    }
}
