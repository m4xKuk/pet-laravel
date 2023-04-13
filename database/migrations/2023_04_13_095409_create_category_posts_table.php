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
        Schema::create('category_posts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('category_id');

            $table->index('post_id', 'category_posts_post_idx'); // текущаяТабл_связнаяТабл_idx
            $table->index('category_id', 'category_posts_category_idx');

            $table->foreign('post_id', 'category_posts_post_fk')->on('posts')->references('id');
            $table->foreign('category_id', 'category_posts_category_fk')->on('categories')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_posts');
    }
};
