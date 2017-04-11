<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1484094537ReactiontoanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reactiontoanswers', function (Blueprint $table) {
            $table->string('audio_path')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reactiontoanswers', function (Blueprint $table) {
            $table->dropColumn('audio_path');
            
        });

    }
}
