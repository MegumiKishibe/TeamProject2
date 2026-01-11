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
        Schema::create('starbucks_stores', function (Blueprint $table) {
            $table->id();
            $table->decimal('lat', 10, 8);
            $table->decimal('lng', 11, 8);
            $table->string('name');
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('status_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('starbucks_store_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('message');
            $table->timestamps();
        });
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_id')->constrained()->onDelete('cascade');
            $table->string('ip_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('starbucks_stores');
    }
};
