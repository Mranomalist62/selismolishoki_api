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
}