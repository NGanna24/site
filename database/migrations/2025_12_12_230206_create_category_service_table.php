<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('service_id');
            $table->integer('order')->default(0);
            $table->boolean('is_primary')->default(false);
            $table->timestamps();

            // Index
            $table->index('category_id');
            $table->index('service_id');
            $table->index(['category_id', 'service_id']);
            $table->index('is_primary');

            // Foreign keys
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');

            $table->foreign('service_id')
                  ->references('id')
                  ->on('services')
                  ->onDelete('cascade');

            // Unique constraint
            $table->unique(['category_id', 'service_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_service');
    }
};