<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasis extends Model
{
    use HasFactory;

    protected $table = 'reservasis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'servis',
        'namaLengkap',
        'alamatLengkap',
        'noTelp',
        'idJenisKerusakan',
        'deskripsi',
        'gambar',
        'video',
        'noResi',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $timestamps = true;

    public function jenisKerusakan()
    {
        return $this->belongsTo(Jenis_kerusakans::class, 'idJenisKerusakan');
    }

    public function riwayats()
    {
        return $this->hasMany(Riwayats::class, 'idReservasi');
    }

    // CREATE
    public static function createReservasi(array $data)
    {
        return self::create($data);
    }

    // READ - All
    public static function getAllReservasi()
    {
        return self::all();
    }

    // READ - By ID
    public static function getReservasiById($id)
    {
        return self::find($id);
    }

    // UPDATE
    public static function updateReservasi($id, array $data)
    {
        $reservasi = self::findOrFail($id);
        $reservasi->update($data);
        return $reservasi;
    }

    // DELETE
    public static function deleteReservasi($id)
    {
        $reservasi = self::findOrFail($id);
        return $reservasi->delete();
    }
}
