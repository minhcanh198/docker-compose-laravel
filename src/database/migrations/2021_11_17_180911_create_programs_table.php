<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->integer('country_id');
            $table->integer('category_id');
            $table->integer('age');
            $table->integer('duration');
            $table->integer('price');
            $table->text('price_info')->nullable();
            $table->text('description', 1200);
            $table->string('tags')->nullable();
            $table->text('accommodation', 800);
            $table->text('location', 800);
            $table->text('typical_day', 800)->nullable();
            $table->text('expectation', 800)->nullable();
            $table->text('orientation', 800)->nullable();
            $table->text('good_to_know', 800)->nullable();
            $table->text('included_services', 200)->nullable();
            $table->text('optional_services', 200)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
