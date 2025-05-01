<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    // Define the table if it's different from the plural form of the model
    protected $table = 'users';

    // Define the primary key if it's different from 'id'
    protected $primaryKey = 'id';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
    ];

    // Define which attributes should be cast to specific types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Optionally disable timestamps if you don't want Eloquent to manage created_at and updated_at automatically
    public $timestamps = true;
}