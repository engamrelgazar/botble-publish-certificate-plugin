<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('certificates')) {
            Schema::create('certificates', function (Blueprint $table) {
                $table->id();
                $table->string('image_url', 255); 
                $table->string('title', 255)->nullable(); 
                $table->string('status', 60)->default('published');
                $table->timestamps(); 
            });
        }

        if (! Schema::hasTable('certificates_translations')) {
            Schema::create('certificates_translations', function (Blueprint $table) {
                $table->string('lang_code');
                $table->foreignId('certificates_id')->constrained('certificates')->onDelete('cascade');
                $table->string('title', 255)->nullable();

                $table->primary(['lang_code', 'certificates_id'], 'certificates_translations_primary');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates_translations');
        Schema::dropIfExists('certificates');
    }
};