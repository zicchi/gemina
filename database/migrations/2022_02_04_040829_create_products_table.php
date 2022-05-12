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
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('register_form')->nullable();
            $table->morphs('initiator');
            $table->dateTime('date');
            $table->bigInteger('category_id')->index();
            $table->decimal('fee',14,2);
            $table->boolean('activated')->default(true);
            $table->integer('capacity');
            $table->string('image');
            $table->boolean('online');
            $table->string('speaker');
            $table->string('place');
            $table->string('contact');
            $table->boolean('verified')->default(false);
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
