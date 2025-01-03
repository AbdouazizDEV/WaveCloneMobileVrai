<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role'; // Spécifier explicitement le nom de la table

    protected $fillable = ['libelle', 'plafond'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
