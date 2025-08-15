<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Banners extends Model implements Sortable
{
    use HasFactory, SortableTrait, SoftDeletes;
	protected $table = 'banners';
	protected $fillable = [
		'type',
		'img',
		'video',
		'youtube_id',
		'link_type',
		'url',
		'content_id',
		'name',
		'title',
		'subtitle',
		'hotspot_youtube_id',
		'order',
		'start',
		'end',
		'is_publish'
	];
	protected $casts = [
		'order' => 'integer',
		'start' => 'date',
		'end' => 'date',
		'is_publish' => 'boolean'
	];

	public $sortable = [
		'order_column_name' => 'order',
		'sort_when_creating' => true
	];
	public function scopePublished( $query ){
		return $query->where('start','<=',now()->format('Y-m-d'))
				->where('is_publish', 1)
				->where( function( $query ){
					$query->where("end",">=",now()->format("Y-m-d"))
							->orWhere("end",null);
				})
									->orderBy('order','asc');
	}

	public function getPeriodAttribute(){
		return $this->start->format('d M Y').' - '.( $this->end == '' || $this->end == null ? 'indefinite' : $this->end->format('d M Y') );
	}

	public function hotspots(){
		return $this->hasMany('App\Models\BannerHotspots', 'banner_id', 'id');
	}

	public function research(){
		return $this->belongsTo('App\Models\Researches', 'content_id', 'id');
	}

	public function setHotspotYoutubeIdAttribute($value){
		$this->attributes['hotspot_youtube_id'] = self::extractYoutubeId($value);
    }

	public static function extractYoutubeId($url){
        preg_match('/(?:v=|\/)([0-9A-Za-z_-]{11})(?:[&?\/]|$)/', $url, $matches);
        return $matches[1] ?? $url; // fallback: return original if not matched
    }

	public function getDisplayMediaAttribute(){
		$response = null;
		switch( $this->type ){
			case 'image' :
				if( $this->img ){
					$response = \Storage::disk('public')->url( $this->img );
				}
			break;
			case 'video' :
				if( $this->video ){
					$response = \Storage::disk('public_vdo_media')->url( $this->video );
				}
			break;
			case 'youtube' :
				if( $this->youtube_id ){
					// $response = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$this->youtube_id.'" allowfullscreen></iframe></div>';
					$response = 'https://www.youtube.com/embed/'.$this->youtube_id;
				}
			break;
			default: $response = null;
		}
        
        return $response;
	}
}
