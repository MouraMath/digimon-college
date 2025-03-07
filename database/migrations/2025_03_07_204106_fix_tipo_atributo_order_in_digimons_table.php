<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // criar colunas temporárias
        Schema::table('digimons', function (Blueprint $table) {
            $table->string('temp_tipo')->nullable();
            $table->string('temp_atributo')->nullable();
        });

        // copiar os dados invertidos
        DB::table('digimons')->update([
            'temp_tipo' => DB::raw('`atributo`'),
            'temp_atributo' => DB::raw('`tipo`')
        ]);

        // Remover as colunas originais
        Schema::table('digimons', function (Blueprint $table) {
            $table->dropColumn(['tipo', 'atributo']);
        });

        // Adicionar as colunas novamente na ordem correta
        Schema::table('digimons', function (Blueprint $table) {
            $table->enum('atributo', ['Vaccine', 'Virus', 'Data', 'Free'])->after('level');
            $table->enum('tipo', ['Mamífero', 'Reptil', 'Ave', 'Inseto', 'Peixe', 'Dragão', 'Humanoide', 'Outros'])->after('atributo');
        });

        // Copiar os dados das colunas temporárias para as novas colunas
        DB::table('digimons')->update([
            'tipo' => DB::raw('`temp_tipo`'),
            'atributo' => DB::raw('`temp_atributo`')
        ]);

        // Remover as colunas temporárias
        Schema::table('digimons', function (Blueprint $table) {
            $table->dropColumn(['temp_tipo', 'temp_atributo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // O processo inverso seria muito semelhante, mas com as colunas invertidas novamente
        // Omitido por brevidade
    }
};
