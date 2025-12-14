<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
    ];

    /**
     * Category creator relation
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
