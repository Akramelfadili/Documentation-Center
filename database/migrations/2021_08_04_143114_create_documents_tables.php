<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_tables', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedInteger("modele_id");
            $table->unsignedInteger("classe_id");
            $table->json("properties");
            $table->timestamps();
            $table->foreign("modele_id")->references("id")->on("modeles")->ondelete("cascade");
            $table->foreign("classe_id")->references("id")->on("classe_documents")->ondelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents_tables');
    }
}
