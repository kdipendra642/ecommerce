<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_category_id');
            $table->string('post_title_en');
            $table->string('post_title_nep');
            $table->string('post_title_slug_en')->nullable();
            $table->string('post_title_slug_hin')->nullable();
            $table->string('post_image')->nullable();
            $table->text('post_description_en')->nullable();
            $table->text('post_description_hin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
