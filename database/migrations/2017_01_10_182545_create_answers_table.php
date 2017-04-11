<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('answers')) {
            Schema::create('answers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('text_answer')->nullable();
                $table->string('media_answer')->nullable();
                $table->tinyInteger('is_correct')->default(0);
                $table->integer('slide_id')->unsigned()->nullable();
                $table->foreign('slide_id', 'fk_7417_slide_answer')->references('id')->on('slides');
                
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
        Schema::dropIfExists('answers');
    }
}
