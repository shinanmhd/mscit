<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class RoadClosures extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'given_to',
        'work_location',
        'work_road',
        'closure_type_id',
        'closure_detail',
        'closure_from',
        'closure_to',
        'shape',
        'shape_data',
        'lat',
        'lng',
        'created_by',
    ];

    public function closureType()
    {
        return $this->belongsTo(ClosureType::class);
    }
}
