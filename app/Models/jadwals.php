<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwals extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    protected $primaryKey = 'id';

    protected $fillable = [
        'idReservasi',
        'tanggal',
        'waktuMulai',
        'waktuSelesai',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true; // Laravel will automatically handle 'created_at' and 'updated_at'

    /**
     * Get the related reservation for the jadwal.
     */
    public function reservasi()
    {
        return $this->belongsTo(Reservasis::class, 'idReservasi');
    }
}