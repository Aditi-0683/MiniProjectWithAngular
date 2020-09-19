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
            $table->string('brand_name');
            $table->string('model_name');
            $table->string('price');
            $table->string('front_cam');
            $table->string('back_cam');
            $table->string('display_size');
            $table->string('internal_storage');
            $table->string('ram');
            $table->string('battery');
            $table->string('os');
            $table->string('chip');
            $table->string('sensor');
            $table->string('color');
            $table->string('image');
            $table->string('imagePath');
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
