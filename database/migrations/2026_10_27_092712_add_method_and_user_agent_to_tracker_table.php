<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tracker', function (Blueprint $table) {
            $table->string('method', 10)->default('GET')->after('status');
            $table->string('user_agent', 255)->nullable()->after('method');
        });
    }

    public function down(): void
    {
        Schema::table('tracker', function (Blueprint $table) {
            $table->dropColumn(['method', 'user_agent']);
        });
    }
};
