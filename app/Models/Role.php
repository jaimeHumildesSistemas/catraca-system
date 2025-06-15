<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', // opcional
    ];

    /**
     * Relação Role -> Users (um papel para vários usuários)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function menus(): BelongsToMany
{
    return $this->belongsToMany(Menu::class, 'menu_role', 'role_id', 'menu_id');
    
}

    /**
     * Relação Role -> Permissions (muitos para muitos)
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
        // role_permission é a tabela pivô    
        }
}
