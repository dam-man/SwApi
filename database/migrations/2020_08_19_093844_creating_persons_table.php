<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatingPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {

            // Setting Collations
            $table->charset   = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            // Setup tables
            $table->id();
            $table->integer('planet_id')->default(0);
            $table->string('name', 255)->default(null)->nullable();
            $table->string('height', 50)->default(null)->nullable();
            $table->string('mass', 50)->default(null)->nullable();
            $table->string('hair_color', 50)->default(null)->nullable();
            $table->string('skin_color', 50)->default(null)->nullable();
            $table->string('eye_color', 50)->default(null)->nullable();
            $table->string('birth_year', 50)->default(null)->nullable();
            $table->string('gender', 15)->default(null)->nullable();
            $table->string('created', 75)->default(null)->nullable();
            $table->string('edited', 75)->default(null)->nullable();
            $table->timestamps();

            // Setting references
            $table->foreign('planet_id')->references('id')->on('planets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
