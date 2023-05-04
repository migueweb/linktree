<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkImpression extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'impressions',
    ];

    /**
     * The relationships with the user model.
     *
     * @var array<int, string>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
