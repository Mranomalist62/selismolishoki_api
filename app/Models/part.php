<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class part extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'harga'];

    public function kerusakan(){
        return $this->belongsToMany(JenisKerusakan::class, 'jenis_kerusakan_parts');
    }
}
