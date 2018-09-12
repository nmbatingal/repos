<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('access_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('access_type')->unique();
            // $table->timestamps();
        });

        Schema::table('research_articles', function($table)
        {
            $table->foreign('access_type')->references('id')->on('access_types')->onDelete('set null')->onUpdate('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('research_articles', function($table)
        {
            $table->dropForeign('research_articles_access_type_foreign');
        });

        Schema::dropIfExists('access_types');*/
    }
}
