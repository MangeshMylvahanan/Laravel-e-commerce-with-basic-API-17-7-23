<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_discount');
            $table->string('product_discountprice');
            $table->string('product_description');
            $table->string('catagory');
            $table->string('subcatagory');
            $table->boolean('is_newest')->default(false);
            $table->boolean('is_trending')->default(false);
            $table->boolean('is_offer')->default(false);
            $table->string('seller_name');
            $table->string('delivery_days');
            $table->string('product_image');
            $table->string('product_images');
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
        Schema::dropIfExists('products');
    }
}
