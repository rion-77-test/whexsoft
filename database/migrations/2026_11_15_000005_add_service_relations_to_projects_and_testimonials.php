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
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable();
            $table->index('service_id', 'projects_service_index');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable();
            $table->index('service_id', 'testimonials_service_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex('projects_service_index');
            $table->dropColumn('service_id');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropIndex('testimonials_service_index');
            $table->dropColumn('service_id');
        });
    }
};
