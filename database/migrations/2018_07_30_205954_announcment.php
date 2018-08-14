<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Announcment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->tinyInteger('status')->nullable();
            $table->unsignedInteger('market_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->foreign('market_id')->references('id')->on('markets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropForeign(['market_id']);
        });

        Schema::dropIfExists('announcements');
    }
}
