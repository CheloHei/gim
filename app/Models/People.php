<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'born',
        'inscription',
        'phone',
    ];
    
    public function measures()
    {
        return $this->hasMany(Measures::class);
    }
}
