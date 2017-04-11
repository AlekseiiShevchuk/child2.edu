<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1484094635ReactiontoanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reactiontoanswers', function (Blueprint $table) {
            $table->dropColumn('type');
            
        });
Schema::table('reactiontoanswers', function (Blueprint $table) {
            $table->enum('type', ["correct","incorrect"]);
                
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
            $table->dropColumn('type');
            
        });
Schema::table('reactiontoanswers', function (Blueprint $table) {
                        $table->enum('type', [""]);
                
        });

    }
}
