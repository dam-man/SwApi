<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {

            // Setting Collations
            $table->charset   = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            // Setup tables
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('classification', 255)->nullable();
            $table->string('designation', 255)->nullable();
            $table->string('skin_colors', 255)->nullable();
            $table->string('hair_colors', 255)->nullable();
            $table->string('eye_colors', 255)->nullable();
            $table->string('language', 255)->nullable();
            $table->string('homeworld', 255)->nullable();
            $table->string('average_height', 255)->nullable();
            $table->string('average_lifespan')->nullable();
            $table->string('created')->nullable();
            $table->string('edited')->nullable();

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
        Schema::dropIfExists('species');
    }
}
