<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->string('product_name');
            $table->string('product_image'); // Store the path to the image
            $table->decimal('product_price', 8, 2);
            $table->decimal('discount', 5, 2)->nullable();
            $table->enum('stock_status', ['in_stock', 'out_of_stock']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
