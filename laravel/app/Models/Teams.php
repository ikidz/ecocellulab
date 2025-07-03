<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Teams extends Model implements Sortable
{
    use HasFactory, SoftDeletes, SortableTrait;
    protected $table = 'teams';
    protected $fillable = [
        'avatar',
        'name',
        'position',
        'order',
        'is_publish',
    ];
    protected $casts = [
        'order' => 'integer',
        'is_publish' => 'boolean',
    ];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function scopePublished()
    {
        return $this->where('is_publish', 1)
                    ->orderBy('order', 'asc');
    }

    public function socials()
    {
        return $this->hasMany(TeamSocials::class, 'team_id', 'id')
                    ->orderBy('order', 'asc')
                    ->where('is_publish', 1);
    }
}
