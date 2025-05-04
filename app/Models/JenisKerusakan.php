<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKerusakan extends Model
{
    use HasFactory;

    protected $table = 'jenis_kerusakans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    /**
     * Get the timestamp for when the entry was created.
     */
    public function createdAt()
    {
        return $this->asDateTime($this->created_at);
    }

    /**
     * Get the timestamp for when the entry was updated.
     */
    public function updatedAt()
    {
        return $this->asDateTime($this->updated_at);
    }

    // CREATE
    public static function createJenisKerusakan(array $data)
    {
        return self::create($data);
    }

    // READ - All
    public static function getAllJenisKerusakan()
    {
        return self::all();
    }

    // READ - By ID
    public static function getJenisKerusakanById($id)
    {
        return self::find($id);
    }

    // UPDATE
    public static function updateJenisKerusakan($id, array $data)
    {
        $jenis = self::findOrFail($id);
        $jenis->update($data);
        return $jenis;
    }

    // DELETE
    public static function deleteJenisKerusakan($id)
    {
        $jenis = self::findOrFail($id);
        return $jenis->delete();
    }
}
