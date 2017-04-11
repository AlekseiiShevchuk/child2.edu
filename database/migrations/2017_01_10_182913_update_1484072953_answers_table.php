<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1484072953AnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn('media_answer');
            
        });
Schema::table('answers', function (Blueprint $table) {
            $table->string('image_answer')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn('image_answer');
            
        });
Schema::table('answers', function (Blueprint $table) {
                        $table->string('media_answer')->nullable();
                
        });

    }
}
