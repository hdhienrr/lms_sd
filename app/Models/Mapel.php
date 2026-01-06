<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels'; // Opsional, tapi bagus untuk memastikan nama tabel

    protected $fillable = [
        'nama',
        'id_kelas',
        'jenis' // Kita tambahkan ini agar input radio button tadi tersimpan
    ];
}