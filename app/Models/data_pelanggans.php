<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Data_Pelanggans extends Model
{
    use HasFactory;

    protected $table = 'data_pelanggans';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'kode',
        'nama',
        'noHP',
        'alamat',
        'keluhan',
        'created_at',
        'updated_at',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value);
    }

    // CREATE
    public static function createPelanggan(array $data)
    {
        return self::create($data);
    }

    // READ - All
    public static function getAllPelanggan()
    {
        return self::all();
    }

    // READ - By ID
    public static function getPelangganById($id)
    {
        return self::find($id);
    }

    // UPDATE
    public static function updatePelanggan($id, array $data)
    {
        $pelanggan = self::findOrFail($id);
        $pelanggan->update($data);
        return $pelanggan;
    }

    // DELETE
    public static function deletePelanggan($id)
    {
        $pelanggan = self::findOrFail($id);
        return $pelanggan->delete();
    }
}
