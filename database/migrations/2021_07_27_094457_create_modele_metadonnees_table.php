<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleMetadonneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_metadonnees', function (Blueprint $table) {
            $table->integer("modele_id")->unsigned();
            $table->integer("metadonnees_id")->unsigned();
            $table->foreign("modele_id")->references("id")->on("modeles");
            $table->foreign("metadonnees_id")->references("id")->on("metadonnees");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modele_metadonnees');
    }
}
