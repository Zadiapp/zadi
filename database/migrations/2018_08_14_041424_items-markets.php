<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemsMarkets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('items_markets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('market_id')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->string('price')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->enum('popular', [0, 1])->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->foreign('market_id')->references('id')->on('markets');
            $table->foreign('item_id')->references('id')->on('items');
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
        Schema::table('items_markets', function (Blueprint $table) {
            $table->dropForeign(['market_id']);
            $table->dropForeign(['item_id']);
        });

        Schema::dropIfExists('items_markets');
    }
}
