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
        Schema::create('banner', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1000);
            $table->string('link', 1000)->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->enum('position', ['slideshow', 'advertise'])->default('slideshow');
            $table->text('description')->nullable();
            $table->string('image', 1000);
            $table->unsignedInteger('created_by')->default(1);
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
            $table->softDeletes('deleted_at');
            $table->timestamps(); //created_at, updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner');
    }
};
