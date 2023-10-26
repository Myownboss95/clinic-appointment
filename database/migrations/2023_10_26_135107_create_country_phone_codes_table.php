<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_phone_codes', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name');
            $table->string('dial_code');
            $table->integer('dial_min_length')->default(0);
            $table->integer('dial_max_length')->default(0);
            $table->string('code')->nullable();
            $table->string('currency_name', 191)->nullable();
            $table->string('currency_code', 191)->nullable();
            $table->string('currency_symbol', 191)->nullable();
            $table->string('flag')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('country_phone_codes');
    }
};
