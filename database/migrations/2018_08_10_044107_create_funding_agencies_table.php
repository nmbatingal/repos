<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundingAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('funding_agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('funding_agency')->unique();
            // $table->timestamps();
        });

        Schema::table('research_articles', function($table)
        {
            $table->foreign('funding_agency')->references('id')->on('funding_agencies')->onDelete('set null')->onUpdate('cascade');
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
            $table->dropForeign('research_articles_funding_agency_foreign');
        });

        Schema::dropIfExists('funding_agencies');*/
    }
}
