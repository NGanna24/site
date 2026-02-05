<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('icon')->default('fas fa-tag');
            $table->string('color')->default('#4361ee');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('service_count')->default(0);
            $table->json('features')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Index
            $table->index('slug');
            $table->index('status');
            $table->index('order');
            $table->index('parent_id');
            $table->index(['status', 'order']);

            // Foreign key pour les catégories parentes
            $table->foreign('parent_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}; 