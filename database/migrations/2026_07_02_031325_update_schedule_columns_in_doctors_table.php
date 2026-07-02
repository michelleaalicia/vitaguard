<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('doctors', function (Blueprint $table) {

            $table->dropColumn('schedule');

            $table->string('available_days')->after('description');

            $table->time('available_start')->after('available_days');

            $table->time('available_end')->after('available_start');

        });
    }

    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {

            $table->dropColumn([
                'available_days',
                'available_start',
                'available_end'
            ]);

            $table->text('schedule')->nullable();

        });
    }
};
