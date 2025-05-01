<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasis extends Model
{
    use HasFactory;

    // Explicitly set the table name as 'reservasis'
    protected $table = 'reservasis';

    // Define the primary key if it's different from 'id'
    protected $primaryKey = 'id';

    // Specify which attributes are mass assignable
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

    // Define which attributes should be cast to specific types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Enable timestamps, so 'created_at' and 'updated_at' will be automatically handled
    public $timestamps = true;

    // Define the relationship to the JenisKerusakan model
    public function jenisKerusakan()
    {
        return $this->belongsTo(Jenis_kerusakans::class, 'idJenisKerusakan');
    }

    // Define the relationship to the Riwayat model (optional, if needed)
    public function riwayats()
    {
        return $this->hasMany(Riwayats::class, 'idReservasi');
    }

    public function createReservasi(array $data): Reservasis
    {
        return Reservasis::create([
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
        $reservasi = Reservasis::find($id);
        if (!$reservasi) {
            return false;
        }

        return $reservasi->delete();
    }
}