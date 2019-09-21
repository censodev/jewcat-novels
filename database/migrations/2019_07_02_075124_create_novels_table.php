<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('novel_name');
            $table->bigInteger('author_id');
            $table->string('novel_translator')->nullable();
            $table->longText('novel_description')->nullable();
            $table->integer('novel_price');
            $table->double('novel_sale_off')->default(0);
            $table->integer('novel_quantity');
            $table->string('novel_publisher');
            $table->smallInteger('novel_rank')->default(0);
            $table->integer('novel_votes_number')->default(0);
            $table->integer('novel_rating_1')->default(0);
            $table->integer('novel_rating_2')->default(0);
            $table->integer('novel_rating_3')->default(0);
            $table->integer('novel_rating_4')->default(0);
            $table->integer('novel_rating_5')->default(0);
            $table->char('novel_size');
            $table->integer('novel_pages');
            $table->char('novel_language');
            $table->string('novel_image_url');
            $table->char('novel_tags')->nullable();
            $table->tinyInteger('novel_status')->default(1);
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
        Schema::dropIfExists('novels');
    }
}
