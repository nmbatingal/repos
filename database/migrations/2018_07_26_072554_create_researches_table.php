<?php

use App\Research;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('title');
            $table->string('authors');
            $table->string('project_duration')->nullable();
            $table->string('funding_agency')->nullable();
            $table->string('project_cost')->nullable();
            $table->longtext('research_content');
            $table->string('keywords');

            $table->string('filename')->nullable();
            $table->integer('filesize')->nullable();

            $table->boolean('status')->default(0);
            $table->uuid('log_id')->index()->nullable();
            $table->timestamps();

            $table->foreign('log_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });

        // Research::createIndex();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researches');
        
        // Research::deleteIndex();
    }
}
