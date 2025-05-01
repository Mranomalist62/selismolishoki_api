<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_kerusakans extends Model
{
    use HasFactory;

    protected $table = 'jenis_kerusakans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true; // Laravel will automatically handle 'created_at' and 'updated_at'

    /**
     * Get the timestamp for when the entry was created.
     *
     * @return \Illuminate\Support\Carbon
     */
    public function createdAt()
    {
        return $this->asDateTime($this->created_at);
    }

    /**
     * Get the timestamp for when the entry was updated.
     *
     * @return \Illuminate\Support\Carbon
     */
    public function updatedAt()
    {
        return $this->asDateTime($this->updated_at);
    }
}