<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id');
            $table->bigInteger('user_id');
            $table->integer('order_price');
            $table->integer('order_pay_method')->comment('1:cash on delivery, 2: ATM');
            $table
                ->integer('order_status')
                ->default(1)
                ->comment('1:waiting, 2:confirmed, 3:transporting, 4:done, 5:canceled');
            $table->string('transport_fee')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
