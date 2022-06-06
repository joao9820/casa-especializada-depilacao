<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePromotions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_promotions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('promotion_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->decimal('new_price', 10, 2);

            $table->foreign('promotion_id')
            ->references('id')->on('promotions');

            $table->foreign('service_id')
            ->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_promotions');
    }
}
