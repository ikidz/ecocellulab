<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Benefits extends Model implements Sortable
{
    use HasFactory, SoftDeletes, SortableTrait;
    protected $table = 'benefits';
    protected $fillable = [
        'display_type',
        'icon',
        'img',
        'title',
        'subtitle',
        'order',
        'is_publish'
    ];
    protected $casts = [
        'order' => 'integer',
        'is_publish' => 'boolean'
    ];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true
    ];
    public function scopePublished($query)
    {
        return $query->where('is_publish', 1)
                     ->orderBy('order', 'asc');
    }
    public function getDisplayImgAttribute()
    {
        if ($this->img && \Storage::disk('public')->get($this->img)) {
            return \Storage::url($this->img);
        }
        return null;
    }
}
