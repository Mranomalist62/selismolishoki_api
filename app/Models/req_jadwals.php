<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Req_jadwals extends Model
{
    use HasFactory;

    protected $table = 'req_jadwals';

    protected $fillable = [
        'idReservasi',
        'tanggal',
        'waktuMulai',
        'waktuSelesai',
        'created_at',
        'updated_at'
    ];

    // Relationship with Reservasi
    public function reservasi()
    {
        return $this->belongsTo(Reservasis::class, 'idReservasi');
    }
}