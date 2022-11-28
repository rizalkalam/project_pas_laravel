<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Preview extends Model
{
    use HasFactory;
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
