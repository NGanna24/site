<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('client_name');
            $table->string('client_email');
            $table->string('client_phone')->nullable();
            $table->text('client_message')->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->text('requirements')->nullable();
            $table->date('deadline')->nullable();
            $table->date('delivered_at')->nullable();
            $table->json('metadata')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Index
            $table->index('order_number');
            $table->index('service_id');
            $table->index('user_id');
            $table->index('status');
            $table->index('client_email');
            $table->index('created_at');

            // Foreign keys
            $table->foreign('service_id')
                  ->references('id')
                  ->on('services')
                  ->onDelete('restrict');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');

            $table->foreign('assigned_to')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};