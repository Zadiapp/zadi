<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('market_id')->nullable();
            $table->unsignedInteger('payment_method_id')->nullable();
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
        Schema::table('market_payment_methods', function (Blueprint $table) {
            $table->dropForeign(['market_id']);
        });

        Schema::dropIfExists('market_payment_methods');
    }
}
