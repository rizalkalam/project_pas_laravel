<?php

namespace App\Models;

use App\Models\Promo;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }
}
