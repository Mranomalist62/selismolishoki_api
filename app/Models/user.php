<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Import this class
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

    public static function createUser(array $data)
    {
        return self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), // Always hash passwords
            'remember_token' => $data['remember_token'] ?? null,
        ]);
    }

    public static function getUserById($id)
    {
        return self::find($id);
    }

    public static function getAllUsers()
    {
        return self::all();
    }

    public static function updateUser($id, array $data)
    {
    $user = self::findOrFail($id);
    $user->update([
        'name' => $data['name'] ?? $user->name,
        'email' => $data['email'] ?? $user->email,
        'password' => isset($data['password']) ? bcrypt($data['password']) : $user->password,
        'remember_token' => $data['remember_token'] ?? $user->remember_token,
    ]);

    return $user;
    }


    public static function deleteUser($id)
    {
        $user = self::findOrFail($id);
        return $user->delete();
    }
}

