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
        Schema::table('redeem_histories', function (Blueprint $table) {
            $table->string('redeem_code')->nullable()->unique()->after('id');
            $table->string('qr_token')->nullable()->after('redeem_code');
            $table->timestamp('expires_at')->nullable()->after('qr_token');
            $table->foreignId('kasir_id')->nullable()->after('points_used')->constrained('users')->nullOnDelete();
            $table->foreignId('transaction_id')->nullable()->after('kasir_id')->constrained('transactions')->nullOnDelete();
            $table->string('status')->default('pending')->change();
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('points_redeemed')->default(0)->after('points_earned');
            $table->decimal('discount_amount', 12, 2)->default(0)->after('points_redeemed');
            $table->string('redeem_code')->nullable()->after('discount_amount');
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['points_redeemed', 'discount_amount', 'redeem_code']);
        });

        Schema::table('redeem_histories', function (Blueprint $table) {
            $table->dropForeign(['kasir_id']);
            $table->dropForeign(['transaction_id']);
            $table->dropColumn(['redeem_code', 'qr_token', 'expires_at', 'kasir_id', 'transaction_id']);
        });
    }
};
