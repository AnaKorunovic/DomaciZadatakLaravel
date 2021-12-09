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
            $table->bigIncrements('id');
            $table->timestamps();
            
            
            $table->text('name');  // naziv proizvoda
            $table->text('description')->nullable();   // opis proizvod
            $table->decimal('price', 10, 2)->nullable(); // cena
            $table->text('slug'); // product slug

            $table->foreignId('brand_id');
            $table->foreignId('creator_id');
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
