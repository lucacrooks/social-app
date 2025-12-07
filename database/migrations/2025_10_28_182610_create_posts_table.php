<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');//author
            $table->string('image')->nullable(); //path to image
            $table->text('caption')->nullable(); //caption text
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('posts');//drops table
    }
}
