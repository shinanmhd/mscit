<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Profile extends Model
{
    use HasFactory;

    public $casts = [
        'preferences' => SchemalessAttributes::class,
    ];

    protected $fillable = [
        'user_id',
        'phone',
        'bio',
        'location',
    ];

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->extra_attributes->modelScope();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isComplete(): bool
    {
        // Required fields for a complete profile
        $requiredFields = ['phone', 'bio', 'location'];

        foreach ($requiredFields as $field) {
            if (empty($this->attributes[$field])) {
                return false;
            }
        }

        return true;
    }
}
