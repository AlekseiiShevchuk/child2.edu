<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('slides')) {
            Schema::create('slides', function (Blueprint $table) {
                $table->increments('id');
                $table->enum('type', ["presentation","test"]);
                $table->tinyInteger('is_active')->default(0);
                $table->string('title');
                $table->string('description');
                $table->string('description_audio_file_path')->nullable();
                $table->string('media_content_description')->nullable();
                $table->string('media_content_description_audio_file_path')->nullable();
                $table->string('media_content_image_file_path')->nullable();
                $table->string('media_content_youtube_video')->nullable();
                $table->integer('lesson_id')->unsigned()->nullable();
                $table->foreign('lesson_id', 'fk_7416_lesson_slide')->references('id')->on('lessons');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
