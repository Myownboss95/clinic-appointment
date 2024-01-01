<?php

use App\Models\Service;
use App\Models\Stage;
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
        Schema::table('user_stage', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->foreignIdFor(Stage::class)->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_stage', function (Blueprint $table) {
            $table->foreignIdFor(Service::class);
            $table->dropColumn('stage_id');
        });
    }
};
