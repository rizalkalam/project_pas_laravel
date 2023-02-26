<?php

namespace App\Models;

use App\Models\Promo;
use App\Models\Barang;
use App\Models\Preview;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search']??false, function($query, $search){
            return $query->where('nama_barang', 'like', '%' . $search . '%')
            ->orWhere('nama_barang', 'like', '%' . $search . '%');
        });

        $query->when($filters['kategori']??false, function($query, $category){
            return $query->whereHas('kategori', function($query) use ($category){
                $query->where('id', $category);
            });
        });

        $query->when($filters['range']??false, function($query, $range){
           if ($range == 'low') {
            return $query->orderBy('harga', 'ASC');
           }else{
            return $query->orderBy('harga', 'DESC');
           }
        });
    }    
    // if (!$range[0] && !$range[1]) return $query->all();
    
    // if ($range[0] && !$range[1]) {
    //     return $query
    //         ->where('harga', '>=', $range[0])
    //         // ->orWhere('sale_price', '>=', $range[0])
    //         ->all();
    // }

    // if (!$range[0] && $range[1]) {
    //     return $query
    //         ->where('harga', '<=', $range[1])
    //         // ->orWhere('sale_price', '<=', $range[1])
    //         ->all();
    // }

    // return $query
    //     ->whereBetween('harga', $range)
    //     // ->orWhereBwtween('sale_price', $range)
    //     ->all();
    // }

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

    public function preveiw()
    {
        return $this->belongsTo(Preview::class);
    }
}
