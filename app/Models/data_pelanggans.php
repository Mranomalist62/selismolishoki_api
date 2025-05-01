<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Pelanggans extends Model
{
    use HasFactory;

    protected $table = 'data_pelanggans';

    protected $primaryKey = 'id';

    public $timestamps = true; // Using created_at and updated_at timestamps

    protected $fillable = [
        'kode',
        'nama',
        'noHP',
        'alamat',
        'keluhan',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the timestamp for the record creation.
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value);
    }

    /**
     * Get the timestamp for the last update.
     */
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value);
    }
}