<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasans extends Model
{
    use HasFactory;

    protected $table = 'ulasans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'ulasan',
        'rating',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $timestamps = true;

    public function createUlasan(array $data): Ulasans
    {
        return Ulasans::create([
            'nama'   => $data['nama'],
            'ulasan' => $data['ulasan'],
            'rating' => $data['rating'] ?? 0, // use 0 if rating not provided
        ]);
    }

    public function getAllUlasans()
    {
        return Ulasans::all();
    }

    public function getUlasanById(int $id)
    {
        return Ulasans::find($id);
    }

    public function updateUlasan(int $id, array $data): bool
    {
        $ulasan = Ulasans::find($id);
        if (!$ulasan) {
            return false;
        }

        return $ulasan->update([
            'nama'   => $data['nama'] ?? $ulasan->nama,
            'ulasan' => $data['ulasan'] ?? $ulasan->ulasan,
            'rating' => $data['rating'] ?? $ulasan->rating,
        ]);
    }

    public function deleteUlasan(int $id): bool
    {
        $ulasan = Ulasans::find($id);
        if (!$ulasan) {
            return false;
        }

        return $ulasan->delete();
    }


}
