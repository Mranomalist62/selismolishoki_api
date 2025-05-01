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
     *
     * @return \Illuminate\Support\Carbon|null
     */
    public function reservedAt()
    {
        return $this->asDateTime($this->reserved_at);
    }

    /**
     * Get the timestamp for when the job is available.
     *
     * @return \Illuminate\Support\Carbon
     */
    public function availableAt()
    {
        return $this->asDateTime($this->available_at);
    }

    /**
     * Get the timestamp for when the job was created.
     *
     * @return \Illuminate\Support\Carbon
     */
    public function createdAt()
    {
        return $this->asDateTime($this->created_at);
    }
}