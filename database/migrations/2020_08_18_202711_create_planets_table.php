<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('climate')->nullable();
            $table->string('terrain')->nullable();
            $table->integer('diameter ')->default(0);
            $table->integer('population')->default(0);
            $table->mediumInteger('rotation_period')->default(0);
            $table->mediumInteger('orbital_period')->default(0);
            $table->smallInteger('surface_water ')->default(0);
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
        Schema::dropIfExists('planets');
    }
}
