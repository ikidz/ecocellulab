<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class BannerHotspots extends Model implements Sortable
{
    use HasFactory, SortableTrait, SoftDeletes;
    protected $table = 'banner_hotspots';
    protected $fillable = [
        'banner_id',
        'img',
        'text',
        'order',
        'is_publish'
    ];
    protected $casts = [
        'order' => 'integer',
        'is_publish' => 'boolean'
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
        'sort_on_has_many' => true
    ];

    public function scopePublished($query){
        return $query->where('is_publish', 1)
                     ->orderBy('order', 'asc');
    }

    public function banner(){
        return $this->belongsTo(\App\Models\Banners::class, 'banner_id');
    }
}
