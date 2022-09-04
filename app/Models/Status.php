<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'Status';

    public function getTask()
    {
        // Table - Col in foreign table
        return $this->hasMany(Task::class, 'status_id');
    }
}
