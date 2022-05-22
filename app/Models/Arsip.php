<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function suratmasuk()
    {
        return $this->hasMany(SuratMasuk::class, 'id_arsip');
    }
    public function suratkeluar()
    {
        return $this->hasMany(SuratKeluar::class, 'id_arsip');
    }
}
