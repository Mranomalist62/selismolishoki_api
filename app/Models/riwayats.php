<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayats extends Model
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
        return $this->belongsTo(Reservasis::class, 'idReservasi');
    }

    // CREATE
    public static function createRiwayat(array $data)
    {
        return self::create([
            'idReservasi' => $data['idReservasi'],
            'status'      => $data['status'],
        ]);
    }

    // READ - All
    public static function getAllRiwayat()
    {
        return self::all();
    }

    // READ - By ID
    public static function getRiwayatById($id)
    {
        return self::find($id);
    }

    // UPDATE
    public static function updateRiwayat($id, array $data)
    {
        $riwayat = self::findOrFail($id);
        $riwayat->update([
            'idReservasi' => $data['idReservasi'] ?? $riwayat->idReservasi,
            'status'      => $data['status'] ?? $riwayat->status,
        ]);
        return $riwayat;
    }

    // DELETE
    public static function deleteRiwayat($id)
    {
        $riwayat = self::findOrFail($id);
        return $riwayat->delete();
    }
}
