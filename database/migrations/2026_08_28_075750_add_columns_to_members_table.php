<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->timestamp('qr_expires_at')->nullable()->after('qr_token');
            $table->integer('points')->default(0)->after('gender');
            $table->enum('status', ['pending', 'active', 'inactive'])->default('pending')->after('points'); // <-- Ditambahkan 'pending'
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['qr_expires_at', 'points', 'status']);
        });
    }
};