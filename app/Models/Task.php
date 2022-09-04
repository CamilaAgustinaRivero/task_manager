<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    protected $table = 'tasks';
    use SoftDeletes;
    use HasFactory;

    public function getStatus()
    {
        // Foreign table - Col in foreign table - Col in table
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function getFormattedCreatedAt() {
        return $this->created_at->format('d/m/Y');
    }
}
