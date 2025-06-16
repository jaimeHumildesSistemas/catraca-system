<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;

    // Especifica o nome da tabela corretamente
    protected $table = 'filiais';

    protected $fillable = ['nome'];

    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }
}
