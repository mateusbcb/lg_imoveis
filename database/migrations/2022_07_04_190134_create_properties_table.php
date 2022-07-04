<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->float('price', 11, 2)->nullable();
            $table->float('condominium', 11, 2)->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('business_id')->nullable();
            $table->float('area')->nullable();
            $table->float('building_area')->nullable();
            $table->text('district')->nullable();
            $table->Integer('bedrooms')->nullable();
            $table->Integer('bathrooms')->nullable();
            $table->Integer('garages')->nullable();
            $table->text('details')->nullable();
            $table->json('installations')->nullable();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('business_id')->references('id')->on('business');

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
        Schema::dropIfExists('properties');
    }
}
