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
        Schema::table('modul_score', function (Blueprint $table) {
            if (Schema::hasColumn('modul_score', 'name_modul')) {
                $table->dropColumn('name_modul');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::table('modul_score', function (Blueprint $table) {
            if (!Schema::hasColumn('modul_score', 'name_modul')) {
                $table->string('name_modul')->nullable();
            }
        });
    }
};
