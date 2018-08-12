<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorySubdomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_subdomains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_subdomain');
            $table->integer('category_domain_id')->unsigned();
            // $table->timestamps();

            $table->foreign('category_domain_id')->references('id')->on('category_domains')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('research_articles', function($table)
        {
            $table->foreign('category_subdomain')->references('id')->on('category_subdomains')->onDelete('set null')->onUpdate('cascade');
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
            $table->dropForeign('research_articles_category_subdomain_foreign');
        });

        Schema::dropIfExists('category_subdomains');
    }
}
