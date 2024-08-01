<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosureType extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'detail', 'color', 'status'];

    public function roadClosures()
    {
        return $this->hasMany(RoadClosures::class);
    }
}
