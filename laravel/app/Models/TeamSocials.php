<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class TeamSocials extends Model implements Sortable
{
    use HasFactory, SoftDeletes, SortableTrait;
    protected $table = 'team_socials';
    protected $fillable = [
        'team_id',
        'platform',
        'url',
        'order',
        'is_publish',
    ];
    protected $casts = [
        'team_id' => 'integer',
        'order' => 'integer',
        'is_publish' => 'boolean',
    ];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
        'sort_on_has_many' => true
    ];

    public function scopePublished()
    {
        return $this->where('is_publish', 1)
                    ->orderBy('order', 'asc');
    }

    public function team()
    {
        return $this->belongsTo(Teams::class, 'team_id', 'id');
    }

    public function getDisplayPlatformNameAttribute()
    {
        $platforms = [
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
            'youtube' => 'YouTube',
        ];

        return $platforms[$this->platform] ?? ucfirst($this->platform);
    }
}
