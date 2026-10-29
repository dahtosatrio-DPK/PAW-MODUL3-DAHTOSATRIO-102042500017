<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'anggota_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    // TODO: Definisikan relasi belongsTo ke model Anggota
    public function anggota()
    {
        
    }

    // TODO: Definisikan relasi belongsTo ke model Buku
    public function buku()
    {
        
    }
}
