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
        Schema::create('currency_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('name', 191)->nullable();
            $table->string('code', 191)->nullable();
            $table->string('dial_code', 191)->nullable();
            $table->string('currency_name', 191)->nullable();
            $table->string('currency_symbol', 191)->nullable();
            $table->string('currency_code', 191)->nullable();
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
        Schema::dropIfExists('currency_lists');
    }
};
