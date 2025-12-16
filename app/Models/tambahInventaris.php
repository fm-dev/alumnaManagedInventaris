<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tambahInventaris extends Model
{
    protected $fillable = [
        'inverntaris_id',
        'created_by',
        'jumlah_barang'
    ];
}
