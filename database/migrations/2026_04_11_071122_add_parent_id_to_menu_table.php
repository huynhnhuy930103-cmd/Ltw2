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
        Schema::table('0207menu', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->default(0)->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('0207menu', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
    }
};
