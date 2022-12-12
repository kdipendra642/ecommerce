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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_hin');
            $table->string('product_slug_en');
            $table->string('product_slug_hin');
            $table->string('product_code')->nullable();
            $table->string('product_qty');
            $table->string('product_tags_en')->nullable();
            $table->string('product_tags_hin')->nullable();
            $table->string('product_size_en')->nullable();
            $table->string('product_size_hin')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_hin')->nullable();
            $table->string('selling_price');
            $table->string('buying_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->text('short_description_en')->nullable();
            $table->text('short_description_hin')->nullable();
            $table->text('long_description_en')->nullable();
            $table->text('long_description_hin')->nullable();
            $table->string('product_thumbnail')->nullable();
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
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
}
