<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function disposisi()
    {
        return $this->belongsTo(Disposisi::class, "id_disposisi");
    }

    public function arsip()
    {
        return $this->belongsTo(Arsip::class, "id_arsip", "id_arsip");
    }
}
