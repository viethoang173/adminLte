<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accounts extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->belongsTo(roles::class, 'roles_id', 'id');
    }
}
