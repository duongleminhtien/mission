<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();  
            $table->string('title')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('category_id')->default(0)->nullable();
            $table->string('slug')->nullable();
            $table->text('desc')->nullable();
            $table->string('tags')->nullable(); //từ khóa
            $table->integer('status')->default(0);   
            $table->longText('content')->nullable(); 
            $table->string('post_type')->default('blog')->nullable();
            $table->enum('lang_code',['vn','en'])->default('vn')->nullable();
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
        Schema::dropIfExists('blog');
    }
}
