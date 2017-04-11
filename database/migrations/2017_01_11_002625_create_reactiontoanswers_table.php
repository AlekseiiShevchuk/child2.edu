<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactiontoanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('reactiontoanswers')) {
            Schema::create('reactiontoanswers', function (Blueprint $table) {
                $table->increments('id');
                $table->enum('type', ["correct","incorrect"]);
                $table->string('title');
                $table->string('description')->nullable();
                $table->string('image_path')->nullable();
                $table->string('youtube_video')->nullable();
                
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
        Schema::dropIfExists('reactiontoanswers');
    }
}
