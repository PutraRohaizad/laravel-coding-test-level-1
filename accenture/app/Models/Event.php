<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function scopeActive($query)
    {
        // return $query->whereBetween(now(),[''])
    }
}
