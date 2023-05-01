<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class views extends Model
{
    use HasFactory;

    /**
     * Relationship with User model.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
