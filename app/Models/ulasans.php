<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasans extends Model
{
    use HasFactory;

    // Explicitly set the table name as 'ulasans'
    protected $table = 'ulasans';

    // Define the primary key if it's different from 'id'
    protected $primaryKey = 'id';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'nama',
        'ulasan',
        'rating',
    ];

    // Define which attributes should be cast to specific types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Enable timestamps, so 'created_at' and 'updated_at' will be automatically handled
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