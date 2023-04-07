<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

        // One-to-many
        public function users()
        {
            return $this->hasMany(User::class, 'role_id', 'id');
        }
}
