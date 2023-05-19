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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('product_name');
            $table->string('product_generic_name');
            $table->string('unit_power')->nullable();
            $table->string('product_code')->nullable();
            $table->string('buying_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->text('description')->nullable(); 
            $table->string('weight')->nullable();
            $table->string('buying_date')->nullable();
            $table->string('selling_date')->nullable();
            $table->string('image')->nullable();
            $table->string('stock_quantity')->nullable();
          
            $table->integer('status')->nullable();

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
                $table->foreign('subcategory_id')
                ->references('id')->on('sub_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

                $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');

                $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
