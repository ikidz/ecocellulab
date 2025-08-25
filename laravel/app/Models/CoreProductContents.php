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
        $this->addMediaCollection('core_products')->useDisk('public_core_product_galleries');
    }

    public function getCoreProductGalleryUrlsAttribute(): array{
        return $this->getMedia('core_products')->map->getFullUrl()->all();
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

}
