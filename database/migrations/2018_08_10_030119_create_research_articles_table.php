<?php

use App\ResearchArticle;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_articles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('publication_title');
            $table->string('authors');
            $table->longtext('research_content');
            $table->text('keywords');
            $table->integer('category_field')->unsigned()->nullable();
            $table->integer('category_domain')->unsigned()->nullable();
            $table->integer('category_subdomain')->unsigned()->nullable();
            $table->date('project_duration_start')->nullable();
            $table->date('project_duration_end')->nullable();
            $table->integer('funding_agency_id')->unsigned()->nullable();
            $table->string('project_cost')->nullable();
            $table->integer('access_type_id')->unsigned()->nullable();
            $table->string('filename')->nullable();
            $table->integer('filesize')->nullable();
            $table->string('status');
            $table->uuid('log_id')->index()->nullable();
            $table->timestamps();

            $table->foreign('log_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
        });

        ResearchArticle::createIndex();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_articles');
        ResearchArticle::deleteIndex();
    }
}
