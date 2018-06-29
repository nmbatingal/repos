<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('alternate_title')->nullable();
            $table->text('abstract');

            $table->string('publication_type');
            $table->char('publication_date', 4)->nullable();
            $table->integer('pages');

            $table->string('keywords')->nullable();
            $table->uuid('created_by_id')->index()->nullable();

            $table->text('authors');
            $table->string('filename')->nullable();
            $table->string('filesize')->nullable();

            $table->timestamps();

            $table->foreign('created_by_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_records');
    }
}
