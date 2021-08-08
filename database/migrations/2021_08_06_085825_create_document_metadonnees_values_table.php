<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentMetadonneesValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_metadonnees_values', function (Blueprint $table) {
            $table->integer("document_id")->unsigned();
            $table->integer("metadonnees_id")->unsigned();
            $table->string("value");
            $table->timestamps();
            $table->foreign("document_id")->references("id")->on("documents")->onDelete("cascade");
            $table->foreign("metadonnees_id")->references("id")->on("metadonnees")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_metadonnees_values');
    }
}
