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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('link', 255);
            $table->enum('position', ['mainmenu', 'footermenu'])->default('mainmenu');
            $table->unsignedInteger('table_id')->nullable();
            $table->unsignedInteger('parent_id')->default(0);
            $table->enum('type', ['category', 'brand', 'topic', 'page', 'custom'])->default('custom');
            $table->unsignedInteger('sort_order')->default(1);
            $table->unsignedInteger('created_by')->default(1);
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
