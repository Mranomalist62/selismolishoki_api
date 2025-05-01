<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'queue',
        'payload',
        'attempts',
        'reserved_at',
        'available_at',
        'created_at'
    ];

    public $timestamps = false;

    /**
     * Get the timestamp for when the job is reserved.
     */
    public function reservedAt()
    {
        return $this->asDateTime($this->reserved_at);
    }

    /**
     * Get the timestamp for when the job is available.
     */
    public function availableAt()
    {
        return $this->asDateTime($this->available_at);
    }

    /**
     * Get the timestamp for when the job was created.
     */
    public function createdAt()
    {
        return $this->asDateTime($this->created_at);
    }

    // CREATE
    public static function createJob(array $data)
    {
        return self::create($data);
    }

    // READ - All
    public static function getAllJobs()
    {
        return self::all();
    }

    // READ - By ID
    public static function getJobById($id)
    {
        return self::find($id);
    }

    // UPDATE
    public static function updateJob($id, array $data)
    {
        $job = self::findOrFail($id);
        $job->update($data);
        return $job;
    }

    // DELETE
    public static function deleteJob($id)
    {
        $job = self::findOrFail($id);
        return $job->delete();
    }
}
