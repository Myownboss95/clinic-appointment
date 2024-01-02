<?php

use App\Models\Appointment;
use App\Models\Stage;
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
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn([
                'model_name',
                'model_id',
                'user_id',
                'staff_user_id',
            ]);
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignIdFor(Appointment::class)->after('id');
            $table->foreignIdFor(User::class)->after('id');
            $table->foreignIdFor(Stage::class)->after('body');
            $table->unsignedBigInteger('author_id')->after('body');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('model_name')->after('id');
            $table->sring('model_id')->after('id');
            $table->foreignIdFor(User::class)->after('id');
            $table->unsignedBigInteger('staff_user_id')->after('body');

        });
    }
};
