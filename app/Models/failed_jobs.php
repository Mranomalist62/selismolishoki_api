<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class failed_jobs extends Model
{
    use HasFactory;

    protected $table = 'failed_jobs';

    protected $primaryKey = 'id';

    public $timestamps = false; // Tabel ini tidak memakai created_at dan updated_at

    protected $fillable = [
        'uuid',
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at',
    ];

    public function getFailedAtAttribute($value)
    {
        return Carbon::parse($value);
    }

    // CREATE (hanya untuk testing atau dummy data)
    public static function createFailedJob(array $data)
    {
        return self::create($data);
    }

    // READ - All
    public static function getAllFailedJobs()
    {
        return self::all();
    }

    // READ - By ID
    public static function getFailedJobById($id)
    {
        return self::find($id);
    }

    // UPDATE (not recommended in production)
    public static function updateFailedJob($id, array $data)
    {
        $job = self::findOrFail($id);
        $job->update($data);
        return $job;
    }

    // DELETE
    public static function deleteFailedJob($id)
    {
        $job = self::findOrFail($id);
        return $job->delete();
    }
}
