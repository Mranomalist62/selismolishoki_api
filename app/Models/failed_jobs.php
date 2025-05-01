<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class failed_jobs extends Model
{
    use HasFactory;

    protected $table = 'failed_jobs';

    protected $primaryKey = 'id';

    public $timestamps = false; // No need for created_at and updated_at columns

    protected $fillable = [
        'uuid',
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at',
    ];

    /**
     * Get the timestamp for the failed job.
     */
    public function getFailedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value); // Returns the 'failed_at' timestamp as a Carbon instance
    }
}