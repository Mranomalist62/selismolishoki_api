<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayats extends Model
{
    use HasFactory;

    // Explicitly set the table name as 'riwayats'
    protected $table = 'riwayats';

    // Define the primary key if it's different from 'id'
    protected $primaryKey = 'id';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'idReservasi',
        'status',
    ];

    // Define which attributes should be cast to specific types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Enable timestamps, so 'created_at' and 'updated_at' will be automatically handled
    public $timestamps = true;

    // Define the relationship to the Reservasi model
    public function reservasi()
    {
        return $this->belongsTo(Reservasis::class, 'idReservasi');
    }

    // Create
    public function createRiwayat(array $data): Riwayats
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