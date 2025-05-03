<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
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

    public $timestamps = true;

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class, 'idReservasi');
    }

    // CREATE
    public static function createJadwal(array $data)
    {
        return self::create($data);
    }

    // READ - All
    public static function getAllJadwals()
    {
        return self::all();
    }

    // READ - By ID
    public static function getJadwalById($id)
    {
        return self::find($id);
    }

    // UPDATE
    public static function updateJadwal($id, array $data)
    {
        $jadwal = self::findOrFail($id);
        $jadwal->update($data);
        return $jadwal;
    }

    // DELETE
    public static function deleteJadwal($id)
    {
        $jadwal = self::findOrFail($id);
        return $jadwal->delete();
    }
}
