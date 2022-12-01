<?php

namespace App\Models;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
