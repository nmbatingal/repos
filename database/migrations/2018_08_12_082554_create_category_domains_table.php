<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_domain');
            $table->integer('category_field_id')->unsigned();
            // $table->timestamps();

            $table->foreign('category_field_id')->references('id')->on('category_fields')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('research_articles', function($table)
        {
            $table->foreign('category_domain')->references('id')->on('category_domains')->onDelete('set null')->onUpdate('cascade');
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
            $table->dropForeign('research_articles_category_domain_foreign');
        });
        
        Schema::dropIfExists('category_domains');
    }
}
