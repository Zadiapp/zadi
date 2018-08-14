<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_markets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('market_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->foreign('market_id')->references('id')->on('markets');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories_markets', function (Blueprint $table) {
            $table->dropForeign(['market_id']);
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('categories_markets');
    }
}
