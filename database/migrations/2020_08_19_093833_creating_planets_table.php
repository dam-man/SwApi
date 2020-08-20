<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatingPlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {

            // Setting Collations
            $table->charset   = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            // Setup tables
            $table->id();
            $table->integer('planet_id')->unique()->nullable();
            $table->string('name', 255)->nullable();
            $table->string('climate', 255)->nullable();
            $table->string('terrain', 255)->nullable();
            $table->integer('diameter')->default(0);
            $table->bigInteger('population')->default(0);
            $table->mediumInteger('rotation_period')->default(0);
            $table->mediumInteger('orbital_period')->default(0);
            $table->smallInteger('surface_water')->default(0);
            $table->string('created', 255)->nullable();
            $table->string('edited', 255)->nullable();
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
