<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayats';

    protected $primaryKey = 'id';

    protected $fillable = [
        'idReservasi',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $timestamps = true;

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class, 'idReservasi');
    }

    // Create
    public function createRiwayat(array $data): Riwayat
    {
        return self::create([
            'idReservasi' => $data['idReservasi'],
            'status' => $data['status'] ?? 'pending', // Default if not set
        ]);
    }

    // Read all
    public function getAllRiwayats()
    {
        return self::with('reservasi')->get();
    }

    // Read by ID
    public function getRiwayatById(int $id)
    {
        return self::with('reservasi')->find($id);
    }

    // Update
    public function updateRiwayat(int $id, array $data): bool
    {
        $riwayat = self::find($id);
        if (!$riwayat) {
            return false;
        }

        return $riwayat->update([
            'idReservasi' => $data['idReservasi'] ?? $riwayat->idReservasi,
            'status' => $data['status'] ?? $riwayat->status,
        ]);
    }

    //delete
    public function deleteRiwayat(int $id): bool
    {
        $riwayat = self::find($id);
        if (!$riwayat) {
            return false;
        }

        return $riwayat->delete();
    }





}
