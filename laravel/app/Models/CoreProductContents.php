<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CoreProductContents extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    protected $table = 'core_product_contents';
    protected $fillable = [
        'title',
        'description',
        'link_to',
        'url',
        'content_id',
        'start',
        'end',
        'is_publish'
    ];
    protected $casts = [
        'start' => 'date',
        'end' => 'date',
        'is_publish' => 'boolean',
    ];

    public function registerMediaCollections(): void{
        $this->addMediaCollection('core_product_galleries')->useDisk('public_core_product_galleries');
    }

    public function getCoreProductGalleryUrlsAttribute(): array{
        return $this->getMedia('core_product_galleries')->map->getFullUrl()->all();
    }

    public function scopePublished($query)
    {
        return $query->where('start','<=',now()->format('Y-m-d'))
				->where('is_publish', 1)
				->where( function( $query ){
					$query->where("end",">=",now()->format("Y-m-d"))
							->orWhere("end",null);
				})
                ->orderBy('created_at','desc')
                ->limit(1);
    }

    public function getPeriodAttribute(){
		return $this->start->format('d M Y').' - '.( $this->end == '' || $this->end == null ? 'indefinite' : $this->end->format('d M Y') );
	}

    public function getLinkUrlAttribute(){
        if( $this->link_to == 'research' ){
            $research = \App\Models\Researches::Published()->where('id', $this->content_id)->first();
            if( $research ){
                return route('research.detail', ['slug' => $research->slug]);
            }
            return null;
        }elseif( $this->link_to == 'product' ){
            $product = \App\Models\Products::Published()->where('id', $this->content_id)->first();
            if( $product ){
                return route('product.detail', ['slug' => $this->product->slug]);
            }
            return null;
        }elseif( $this->link_to == 'external' ){
            if( $this->url == '' || $this->url == null ){
                return null;
            }
            return $this->url;
        }else{
            return null;
        }
    }

}
