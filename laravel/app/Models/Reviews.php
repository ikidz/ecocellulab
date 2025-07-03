<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Reviews extends Model implements Sortable
{
    use HasFactory, SortableTrait, SoftDeletes;
    protected $table = 'reviews';
    protected $fillable = [
        'avartar',
        'name',
        'position',
        'rating',
        'content',
        'post_date',
        'start',
        'end',
        'order',
        'is_publish'
    ];
    protected $casts = [
        'rating' => 'integer',
        'post_date' => 'date',
        'start' => 'date',
        'end' => 'date',
        'order' => 'integer',
        'is_publish' => 'boolean'
    ];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true
    ];

    public function scopePublished($query)
    {
        return $query->where('start', '<=', now()->format('Y-m-d'))
            ->where('is_publish', 1)
            ->where(function ($query) {
                $query->where("end", ">=", now()->format("Y-m-d"))
                    ->orWhere("end", null);
            })
            ->orderBy('order', 'asc');
    }
    public function getPeriodAttribute()
    {
        return $this->start->format('d M Y') . ' - ' . ($this->end == '' || $this->end == null ? 'indefinite' : $this->end->format('d M Y'));
    }
    public function getDisplayAvartarAttribute()
    {
        if ( $this->avartar ){
            return \Storage::disk('public')->url($this->avartar);
        }
        return null;
    }
}
