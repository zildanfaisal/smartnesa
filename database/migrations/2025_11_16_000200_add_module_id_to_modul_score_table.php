<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('modul_score', function (Blueprint $table) {
            if (!Schema::hasColumn('modul_score', 'module_id')) {
                $table->foreignId('module_id')->after('user_id')->constrained('modules')->onDelete('cascade');
            }
        });

        Schema::table('modul_score', function (Blueprint $table) {
            // Unique per user per module
            $table->unique(['user_id', 'module_id']);
        });
    }

    public function down(): void
    {
        Schema::table('modul_score', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'module_id']);
            $table->dropConstrainedForeignId('module_id');
        });
    }
};
