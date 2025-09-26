<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('isbn')->unique();
            $table->text('description')->nullable();
            $table->string('publisher')->nullable();
            $table->date('publication_date')->nullable();
            $table->integer('pages')->nullable();
            $table->string('language')->default('English');
            $table->enum('status', ['available', 'borrowed', 'maintenance'])->default('available');
            $table->decimal('price', 10, 2)->nullable();
            $table->string('cover_image')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            // Soft deletes for model -> solves deleted_at missing
            $table->softDeletes();

            // Timestamps AFTER softDeletes is OK
            $table->timestamps();

            // Indexes for performance
            $table->index(['title', 'author']);
            $table->index('isbn');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
