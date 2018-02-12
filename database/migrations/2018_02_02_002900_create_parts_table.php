<?php

use App\Part;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('description', 1000);
            $table->integer('quantity')->unsigned();
            $table->integer('price')->unsigned();
            $table->string('image');
            $table->string('status')->default(Part::UNAVAILABLE_PRODUCT);

            $table->integer('manufacturer_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('subcategories_id')->unsigned();

            $table->timestamps();

            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('subcategories_id')->references('id')->on('part_subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}
