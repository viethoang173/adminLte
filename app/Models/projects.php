<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;

    public function project_status()
    {
//        return $this->belongsTo(Category::class);
        return $this->belongsTo(project_status::class, 'status_id', 'id');
    }
}
