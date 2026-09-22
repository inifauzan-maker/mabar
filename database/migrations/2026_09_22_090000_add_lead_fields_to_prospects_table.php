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
        Schema::table('prospects', function (Blueprint $table) {
            if (! Schema::hasColumn('prospects', 'phone')) {
                $table->string('phone')->nullable()->after('name');
            }

            if (! Schema::hasColumn('prospects', 'city')) {
                $table->string('city')->nullable()->after('phone');
            }

            if (! Schema::hasColumn('prospects', 'school_name')) {
                $table->string('school_name')->nullable()->after('city');
            }

            if (! Schema::hasColumn('prospects', 'class_level')) {
                $table->string('class_level')->nullable()->after('school_name');
            }

            if (! Schema::hasColumn('prospects', 'notes')) {
                $table->text('notes')->nullable()->after('campaign_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prospects', function (Blueprint $table) {
            if (Schema::hasColumn('prospects', 'notes')) {
                $table->dropColumn('notes');
            }

            if (Schema::hasColumn('prospects', 'class_level')) {
                $table->dropColumn('class_level');
            }

            if (Schema::hasColumn('prospects', 'school_name')) {
                $table->dropColumn('school_name');
            }

            if (Schema::hasColumn('prospects', 'city')) {
                $table->dropColumn('city');
            }

            if (Schema::hasColumn('prospects', 'phone')) {
                $table->dropColumn('phone');
            }
        });
    }
};
