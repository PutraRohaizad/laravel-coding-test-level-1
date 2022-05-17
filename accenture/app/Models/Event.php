<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
