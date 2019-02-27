<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterResearchTableLatLongFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('research_articles', function (Blueprint $table) {
            $table->string('location_latitude')->nullable()->after('project_location');
            $table->string('location_longitude')->nullable()->after('location_latitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('research_articles', function (Blueprint $table) {
            $table->dropColumn('location_latitude');
            $table->dropColumn('location_longitude');
        });
    }
}
