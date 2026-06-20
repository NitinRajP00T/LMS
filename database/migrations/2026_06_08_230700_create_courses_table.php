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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->string('title');
            $table->text('description');
            $table->text('learning_points')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->integer('discount_percent')->default(0);
            $table->text('requirements')->nullable();
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->string('language')->default('English');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->integer('students_count')->default(0);
            $table->decimal('average_rating', 3, 2)->default(0.00);
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('user_id');
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
