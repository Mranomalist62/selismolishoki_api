<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_batches extends Model
{
    use HasFactory;

    protected $table = 'job_batches';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'total_jobs',
        'pending_jobs',
        'failed_jobs',
        'failed_job_ids',
        'options',
        'cancelled_at',
        'created_at',
        'finished_at',
    ];

    public $timestamps = false;

    public function createdAt()
    {
        return $this->asDateTime($this->created_at);
    }

    public function finishedAt()
    {
        return $this->finished_at ? $this->asDateTime($this->finished_at) : null;
    }

    public function cancelledAt()
    {
        return $this->cancelled_at ? $this->asDateTime($this->cancelled_at) : null;
    }

    // CREATE
    public static function createJobBatch(array $data)
    {
        return self::create($data);
    }

    // READ - All
    public static function getAllJobBatches()
    {
        return self::all();
    }

    // READ - By ID
    public static function getJobBatchById($id)
    {
        return self::find($id);
    }

    // UPDATE
    public static function updateJobBatch($id, array $data)
    {
        $batch = self::findOrFail($id);
        $batch->update($data);
        return $batch;
    }

    // DELETE
    public static function deleteJobBatch($id)
    {
        $batch = self::findOrFail($id);
        return $batch->delete();
    }
}
