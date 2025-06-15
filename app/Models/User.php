<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [   // corrigido: 'casts' deve ser propriedade, não método
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relação User -> Role (um usuário tem um papel)
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Verifica se o usuário tem um determinado role
     * @param string|array $role
     * @return bool
     */
    public function hasRole($role): bool
    {
        if (!$this->role) {
            return false;  // evita erro caso role seja null
        }

        if (is_string($role)) {
            return $this->role->name === $role;
        }

        if (is_array($role)) {
            return in_array($this->role->name, $role);
        }

        return false;
    }

    /**
     * Verifica se o usuário tem uma permissão via seu role
     * @param string $permission
     * @return bool
     */
    public function hasPermission(string $permission): bool
    {
        if (!$this->role) {
            return false;
        }

        // Assume que Role tem relação 'permissions'
        return $this->role->permissions->contains('name', $permission);
    }
}
