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

    /**
     * Get the timestamp for when the job batch was created.
     *
     * @return \Illuminate\Support\Carbon
     */
    public function createdAt()
    {
        return $this->asDateTime($this->created_at);
    }

    /**
     * Get the timestamp for when the job batch finished.
     *
     * @return \Illuminate\Support\Carbon|null
     */
    public function finishedAt()
    {
        return $this->finished_at ? $this->asDateTime($this->finished_at) : null;
    }

    /**
     * Get the timestamp for when the job batch was cancelled.
     *
     * @return \Illuminate\Support\Carbon|null
     */
    public function cancelledAt()
    {
        return $this->cancelled_at ? $this->asDateTime($this->cancelled_at) : null;
    }
}