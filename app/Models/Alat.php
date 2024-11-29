<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'slug',
        'harga',
        'image',
        'deskripsi',
        'unit',
        'tersedia',
    ];

    public function permohonan()
    {
        return $this->hasMany(SewaAlat::class);
    }
}
