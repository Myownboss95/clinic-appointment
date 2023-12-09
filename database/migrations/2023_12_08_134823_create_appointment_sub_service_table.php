<?php

use App\Models\Appointment;
use App\Models\Stage;
use App\Models\SubService;
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
        Schema::create('appointment_sub_service', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Appointment::class);
            $table->foreignIdFor(SubService::class);
            $table->foreignIdFor(Stage::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_sub_service');
    }
};
