<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Digimon extends Model
{
    use HasFactory;
    
    /**
     * Os atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = ['nome', 'level', 'atributo', 'tipo'];
    
    /**
     * Valores permitidos para o level do Digimon.
     *
     * @var array
     */
    public static $levels = ['Rookie', 'Champion', 'Ultimate', 'Mega'];
    
    /**
     * Valores permitidos para o atributo do Digimon.
     *
     * @var array
     */
    public static $atributos = ['Vaccine', 'Virus', 'Data', 'Free'];
    
    /**
     * Valores permitidos para o tipo do Digimon.
     *
     * @var array
     */
    public static $tipos = ['Mamífero', 'Reptil', 'Ave', 'Inseto', 'Peixe', 'Dragão', 'Humanoide', 'Outros'];
}
