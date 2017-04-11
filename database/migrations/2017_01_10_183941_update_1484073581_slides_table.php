<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1484073581SlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('media_content_image_file_path');
            
        });
Schema::table('slides', function (Blueprint $table) {
            $table->string('media_content_description_audio_file_path')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('media_content_description_audio_file_path');
            
        });
Schema::table('slides', function (Blueprint $table) {
                        $table->string('media_content_image_file_path')->nullable();
                
        });

    }
}
