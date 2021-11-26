<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'prenom','age','poste'
      ];
    public function experience()
    {
        return $this->hasOne(Experience::class);
    }
}
