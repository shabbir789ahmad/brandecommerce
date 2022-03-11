<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
          Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('uname');
            $table->string('message');
            $table->string('rating');
             $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('review_id')->unsigned();
            $table->foreign('review_id')->references('id')
                ->on('products')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('reviews');
    }
}
