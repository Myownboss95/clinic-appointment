<?php

use App\Models\PaymentChannel;
use App\Models\SubService;
use App\Models\User;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('ref')->unique();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(SubService::class);
            $table->foreignIdFor(PaymentChannel::class);
            $table->double('amount');
            $table->string('status');
            $table->string('type');
            $table->string('reason')->nullable();
            $table->string('proof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
