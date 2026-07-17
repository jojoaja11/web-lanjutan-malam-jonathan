<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $database = DB::connection()->getDatabaseName();

        // Drop unique index on dosen.user_id if it exists
        try {
            $exists = DB::select(
                'SELECT COUNT(1) as c FROM INFORMATION_SCHEMA.STATISTICS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND INDEX_NAME = ?',
                [$database, 'dosen', 'dosen_user_id_unique']
            );

            if (!empty($exists) && $exists[0]->c) {
                Schema::table('dosen', function (Blueprint $table) {
                    $table->dropUnique('dosen_user_id_unique');
                });
            }
        } catch (\Exception $e) {
            // ignore - DB platform might not support INFORMATION_SCHEMA or permissions
        }

        // Drop unique index on mahasiswa.user_id if it exists
        try {
            $exists = DB::select(
                'SELECT COUNT(1) as c FROM INFORMATION_SCHEMA.STATISTICS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND INDEX_NAME = ?',
                [$database, 'mahasiswa', 'mahasiswa_user_id_unique']
            );

            if (!empty($exists) && $exists[0]->c) {
                Schema::table('mahasiswa', function (Blueprint $table) {
                    $table->dropUnique('mahasiswa_user_id_unique');
                });
            }
        } catch (\Exception $e) {
            // ignore
        }
    }

    public function down(): void
    {
        // Re-create unique indexes
        Schema::table('dosen', function (Blueprint $table) {
            $table->unique('user_id');
        });

        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->unique('user_id');
        });
    }
};
