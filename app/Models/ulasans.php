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

    // CREATE
    public static function createUlasan(array $data)
    {
        return self::create([
            'nama'   => $data['nama'],
            'ulasan' => $data['ulasan'],
            'rating' => $data['rating'],
        ]);
    }

    // READ - All
    public static function getAllUlasans()
    {
        return self::all();
    }

    // READ - By ID
    public static function getUlasanById($id)
    {
        return self::find($id);
    }

    // UPDATE
    public static function updateUlasan($id, array $data)
    {
        $ulasan = self::findOrFail($id);
        $ulasan->update([
            'nama'   => $data['nama'] ?? $ulasan->nama,
            'ulasan' => $data['ulasan'] ?? $ulasan->ulasan,
            'rating' => $data['rating'] ?? $ulasan->rating,
        ]);
        return $ulasan;
    }

    // DELETE
    public static function deleteUlasan($id)
    {
        $ulasan = self::findOrFail($id);
        return $ulasan->delete();
    }
}
