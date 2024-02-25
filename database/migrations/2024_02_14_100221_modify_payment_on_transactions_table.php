<?php

use App\Models\PaymentChannel;
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
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreignIdFor(PaymentChannel::class)
            ->nullable()
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('payment_channel_id');
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreignIdFor(PaymentChannel::class)->after('user_id');
        });
    }
};
