<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->integer('duration_days')->nullable();
            $table->integer('duration_hours')->nullable();
            $table->enum('media_type', ['image', 'video'])->default('image');
            $table->string('video_url')->nullable();
            $table->json('features')->nullable();
            $table->text('requirements')->nullable();
            $table->text('deliverables')->nullable();
            $table->enum('status', ['active', 'inactive', 'draft'])->default('draft');
            $table->integer('views')->default(0);
            $table->integer('orders_count')->default(0);
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('reviews_count')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->json('seo_data')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Index
            $table->index('slug');
            $table->index('title');
            $table->index('status');
            $table->index('category_id');
            $table->index('price');
            $table->index(['status', 'published_at']);
            $table->index('created_by');

            // Foreign keys
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('restrict');

            $table->foreign('created_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');

            $table->foreign('updated_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};