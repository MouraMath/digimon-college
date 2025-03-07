<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDigimonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('digimons', function (Blueprint $table) {
            // Renomear 'elemento' para 'atributo'
            $table->renameColumn('elemento', 'atributo');

            // Adicionar constraints para 'level', 'tipo', e 'atributo'
            $table->enum('level', ['Rookie', 'Champion', 'Ultimate', 'Mega'])->change();
            $table->enum('tipo', ['Mamífero', 'Reptil', 'Ave', 'Inseto', 'Peixe', 'Dragão', 'Humanoide', 'Outros'])->change();
            $table->enum('atributo', ['Vaccine', 'Virus', 'Data', 'Free'])->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('digimons', function (Blueprint $table) {
            // Reverter mudanças
            $table->renameColumn('atributo', 'elemento');
            $table->string('level')->change();
            $table->string('tipo')->change();
            $table->string('atributo')->change();
        });
    }
}
