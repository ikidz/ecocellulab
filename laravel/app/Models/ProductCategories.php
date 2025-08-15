<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class ProductCategories extends Model implements Sortable
{
    use HasFactory, SortableTrait, SoftDeletes;
    protected $table = 'product_categories';
    protected $fillable = [
        'title',
        'slug',
        'order',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'is_publish',
    ];
    protected $casts = [
        'order' => 'integer',
        'is_publish' => 'boolean'
    ];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true
    ];

    public function scopePublished($query){
        return $query->where('is_publish', 1)
                     ->orderBy('order', 'asc');
    }

    public function getDisplayMetaImageAttribute(){
        if( $this->meta_image ){
            return \Storage::disk('public')->url( $this->meta_image );
        }
        return null;
    }

    public function products(){
        return $this->hasMany('App\Models\Products', 'category_id', 'id');
    }
}
