<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;

    public function accounts() {
        return $this->hasMany(accounts::class, 'roles_id', 'id');
    }
}
