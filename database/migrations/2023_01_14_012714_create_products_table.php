<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('product_color');
            $table->string('product_size')->nullable();
            $table->integer('product_price');
            $table->integer('product_qty');
            $table->string('product_tag');
            $table->string('product_thumbnail')->nullable();
            $table->integer('discount_price')->nullable();
            $table->string('short_des');
            $table->text('long_des');
            $table->integer('specail_offer')->nullable();
            $table->integer('hot_deals')->nullable();
            $table->integer('features')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
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
};
