<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1484082473SlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('type');
            
        });
Schema::table('slides', function (Blueprint $table) {
            $table->enum('type', ["presentation","test"]);
                
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
            $table->dropColumn('type');
            
        });
Schema::table('slides', function (Blueprint $table) {
                        $table->enum('type', [""]);
                
        });

    }
}
