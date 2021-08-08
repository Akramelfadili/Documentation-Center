<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("modele_id");
            $table->unsignedInteger("classe_id");
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
        Schema::dropIfExists('documents');
    }
}
