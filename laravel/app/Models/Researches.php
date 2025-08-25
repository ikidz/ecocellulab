<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Researches extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;
    protected $table = 'researches';
    protected $fillable = [
        'thumb',
        'img',
        'title',
        'description',
        'content',
        'post_date',
        'start',
        'end',
        'is_highlight',
        'is_publish',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image'
    ];
    protected $casts = [
        'post_date' => 'date',
        'start' => 'date',
        'end' => 'date',
        'is_publish' => 'boolean',
    ];

    public function registerMediaCollections(): void{
        $this->addMediaCollection('research_galleries')->useDisk('public_research_galleries');
    }

    public function getResearchGalleryUrlsAttribute(): array{
        return $this->getMedia('research_galleries')->map->getFullUrl()->all();
    }

    public function scopePublished($query)
    {
        return $query->where('start','<=',now()->format('Y-m-d'))
				->where('is_publish', 1)
				->where( function( $query ){
					$query->where("end",">=",now()->format("Y-m-d"))
							->orWhere("end",null);
				})
									->orderBy('post_date','desc');
    }

    public function scopeHighlighted( $query ){
        return $query->where('is_highlight', 1)
                ->where('start','<=',now()->format('Y-m-d'))
                ->where('is_publish', 1)
                ->where( function( $query ){
                    $query->where("end",">=",now()->format("Y-m-d"))
                            ->orWhere("end",null);
                })
                ->limit(1)
                ->orderBy('post_date','desc');
    }

    public function getPeriodAttribute()
    {
		return $this->start->format('d M Y').' - '.( $this->end == '' || $this->end == null ? 'indefinite' : $this->end->format('d M Y') );
	}

    public function getDisplayPostDateAttribute()
    {
        $date = null;
        if( $this->post_date ){
            $date = $this->post_date->format('d M Y');
        }
        return $date;
    }

    public function getDisplayThumbAttribute()
    {
        $image = null;
        if( $this->thumb ){
            $image = \Storage::disk('public')->url( $this->thumb );
        }
        return $image;
    }

    public function getDisplayImageAttribute()
    {
        $image = null;
        if( $this->img ){
            $image = \Storage::disk('public')->url( $this->img );
        }
        return $image;
    }

    public function getDisplayMetaImageAttribute()
    {
        $image = null;
        if( $this->meta_image ){
            $image = \Storage::disk('public')->url( $this->meta_image );
        }
        return $image;
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = \Str::slug(strtolower($value), '-');
    }
}
