<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    // One-to-one
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // One-to-many
    public function items()
    {
        return $this->hasMany(items::class, 'id', 'item_id');
    }

}
