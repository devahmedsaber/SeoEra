<?php

use App\Models\Admin\Product;
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
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('img')->nullable();
            $table->double('price');
            $table->bigInteger('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->timestamps();
        });

        Product::create([
            'name'        => 'CocaCola',
            'description' => 'Pepsi Desc',
            'img'         => '/uploads/products_images/cocacola.jpg',
            'price'       => '6',
            'language_id' => 1
        ]);

        Product::create([
            'name'        => 'Spirite',
            'description' => 'Spirite Desc',
            'img'         => '/uploads/products_images/spirite.png',
            'price'       => '8',
            'language_id' => 2
        ]);
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
