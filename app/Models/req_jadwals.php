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

    public $timestamps = true;

    // Relationship with Reservasi
    public function reservasi()
    {
        return $this->belongsTo(Reservasis::class, 'idReservasi');
    }

    // CREATE
    public static function createReqJadwal(array $data)
    {
        return self::create($data);
    }

    // READ - All
    public static function getAllReqJadwals()
    {
        return self::all();
    }

    // READ - By ID
    public static function getReqJadwalById($id)
    {
        return self::find($id);
    }

    // UPDATE
    public static function updateReqJadwal($id, array $data)
    {
        $reqJadwal = self::findOrFail($id);
        $reqJadwal->update($data);
        return $reqJadwal;
    }

    // DELETE
    public static function deleteReqJadwal($id)
    {
        $reqJadwal = self::findOrFail($id);
        return $reqJadwal->delete();
    }
}
