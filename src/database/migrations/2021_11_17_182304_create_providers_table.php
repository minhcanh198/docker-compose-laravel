<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->string('brand_name', 40)->nullable();
            $table->string('website', 300)->nullable();
            $table->string('email', 300);
            $table->string('street', 20);
            $table->string('zip_code', 20);
            $table->string('city', 20);
            $table->integer('country_id');
            $table->string('vat_number')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
