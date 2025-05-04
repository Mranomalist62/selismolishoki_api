<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'servis',
        'namaLengkap',
        'alamatLengkap',
        'latitude',
        'longitude',
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
        return $this->belongsTo(JenisKerusakan::class, 'idJenisKerusakan');
    }

    public function riwayats()
    {
        return $this->hasMany(Riwayat::class, 'idReservasi');
    }

    public function createReservasi(array $data): Reservasi
    {
        return Reservasi::create([
            'servis'           => $data['servis'],
            'namaLengkap'      => $data['namaLengkap'],
            'alamatLengkap'    => $data['alamatLengkap'],
            'latitude'         => $data['latitude'] ?? null,
            'longitude'        => $data['longitude'] ?? null,
            'noTelp'           => $data['noTelp'],
            'idJenisKerusakan' => $data['idJenisKerusakan'],
            'deskripsi'        => $data['deskripsi'],
            'gambar'           => $data['gambar'] ?? null,
            'video'            => $data['video'] ?? null,
            'noResi'           => $data['noResi'] ?? null,
            'status'           => $data['status'] ?? 'pending',
        ]);
    }

    public function deleteReservasi(int $id): bool
    {
        $reservasi = Reservasi::find($id);
        if (!$reservasi) {
            return false;
        }

        return $reservasi->delete();
    }
}
