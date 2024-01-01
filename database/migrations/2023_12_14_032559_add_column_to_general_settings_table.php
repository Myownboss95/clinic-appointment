<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('general_settings', function (Blueprint $table) {

            $table->string('facebook')->after('id');
            $table->string('instagram')->after('id');
            $table->string('linkedin')->after('id');
            $table->string('site_email')->after('id');
            $table->string('site_phone')->after('id');
            $table->double('ref_bonus', null, 2, true)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('general_settings', function (Blueprint $table) {
            //
        });
    }
};
