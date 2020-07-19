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
            $table->string('uuid');
            $table->unsignedBigInteger('property_type_id')->default(0);
            $table->string('county')->nullable();
            $table->string('country')->nullable();
            $table->string('town')->nullable();
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('image_full')->nullable();
            $table->string('image_thumbnail')->nullable();
            $table->decimal('latitude', 10, 7)->default(0);
            $table->decimal('longitude', 10, 7)->default(0);
            $table->integer('num_bedrooms')->default(0);
            $table->integer('num_bathrooms')->default(0);
            $table->integer('price')->default(0);
            $table->string('type')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('property_type_id')->references('id')->on('property_types');
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
