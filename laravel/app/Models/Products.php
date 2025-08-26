<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Products extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasTags;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'img',
        'title',
        'sku',
        'rating',
        'price',
        'short_description',
        'description',
        // 'tags',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'is_publish',
    ];
    protected $casts = [
        'price' => 'decimal:2',
        'rating' => 'integer',
        // 'tags' => 'array',
        'is_publish' => 'boolean'
    ];

    public function registerMediaCollections(): void{
        $this->addMediaCollection('product_galleries')->useDisk('public_product_galleries');
    }

    public function scopePublished($query){
        return $query->where('is_publish', 1)
                     ->orderBy('created_at', 'desc');
    }

    public function category(){
        return $this->belongsTo('App\Models\ProductCategories', 'category_id', 'id');
    }

    public function reviews(){
        return $this->hasMany('App\Models\ProductReviews', 'product_id', 'id');
    }

    public function getDisplayPriceAttribute(){
        return number_format($this->price, 2, '.', '');
    }

    public function getDisplayImgAttribute(){
        if( $this->img ){
            return \Storage::disk('public')->url( $this->img );
        }
        return null;
    }

    public function getDisplayMetaImageAttribute(){
        if( $this->meta_image ){
            return \Storage::disk('public')->url( $this->meta_image );
        }
        return null;
    }
}
