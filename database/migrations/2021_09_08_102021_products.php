<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('products', function(Blueprint $table){
           $table->id();
            $table->string('name');
            $table->string('detail');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->string('total');
            $table->string('ship')->nullable();
            $table->string('product_status')->nullable();
            $table->bigInteger('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')
            ->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('sub_id')->unsigned();
            $table->foreign('sub_id')->references('id')
            ->on('submenues')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('Products');
    }
}
