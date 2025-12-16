<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventaris extends Model
{
    //
    protected $fillable = [
        'nama_barang',
        'jumlah_barang',
        'created_by',
        'kategori_id'
    ];
}
