<?php

use App\Models\Stage;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
