<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class RoadClosures extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use Commentable;

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

    public function closureType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ClosureType::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
