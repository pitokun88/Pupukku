<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pupuk extends Model
{
    use HasFactory;

    protected $table = 'pupuk';

    protected $fillable = [
        'nama_pupuk',
        'jenis_pupuk',
        'deskripsi',
        'stok',
        'harga',
        'satuan',
        'foto',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer',
    ];
}