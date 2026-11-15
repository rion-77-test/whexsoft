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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('service_category_id');

            $table->string('title');
            $table->string('slug', 191)->unique();
            $table->string('short_description')->nullable();

            $table->text('intro')->nullable();
            $table->longText('content')->nullable();

            $table->json('features')->nullable();
            $table->json('steps')->nullable();
            $table->json('faqs')->nullable();

            $table->string('meta_title', 70)->nullable();
            $table->string('meta_description', 180)->nullable();

            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['service_category_id', 'is_active', 'sort_order'], 'services_category_active_sort');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
