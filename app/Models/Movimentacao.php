<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'tipo', // entrada ou saída
        'valor',
        'data',
        'colaborador_id'
    ];

    public function colaborador()
    {
        return $this->belongsTo(User::class, 'colaborador_id');
    }
}
