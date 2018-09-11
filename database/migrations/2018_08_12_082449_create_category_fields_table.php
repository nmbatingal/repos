<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_field');
            // $table->timestamps();
        });

        Schema::table('research_articles', function($table)
        {
            $table->foreign('category_field')->references('id')->on('category_fields')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('research_articles', function($table)
        {
            $table->dropForeign('research_articles_category_field_foreign');
        });

        Schema::dropIfExists('category_fields');
    }
}
