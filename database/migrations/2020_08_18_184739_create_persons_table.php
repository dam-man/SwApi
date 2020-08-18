<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->charset   = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('name', 255)->default(null);
            $table->string('height', 50)->default(null);
            $table->string('mass', 50)->default(null);
            $table->string('hair_color', 50)->default(null);
            $table->string('skin_color', 50)->default(null);
            $table->string('eye_color', 50)->default(null);
            $table->string('birth_year', 50)->default(null);
            $table->string('gender', 15)->default(null);
            $table->string('homeworld', 255)->default(null);
            $table->string('url', 255)->default(null);
            $table->string('created', 75)->default(null);
            $table->string('edited', 75)->default(null);
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
        Schema::dropIfExists('persons');
    }
}
