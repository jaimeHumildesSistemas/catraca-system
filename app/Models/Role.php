<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Relação muitos-para-muitos com User
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // Relação muitos-para-muitos com Permission
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }
}
