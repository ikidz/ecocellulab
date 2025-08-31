<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'articles';
    protected $fillable = [
        'thumb',
        'img',
        'title',
        'caption',
        'desc',
        'post_date',
        'start',
        'end',
        'is_publish',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
    ];
    protected $casts = [
        'post_date' => 'date',
        'start' => 'date',
        'end' => 'date',
        'is_highlight' => 'boolean',
        'is_publish' => 'boolean'
    ];

    public static function boot(){
        parent::boot();
    }

    public function scopePublished( $query ){
        return $query->where('start','<=',now()->format('Y-m-d'))
				->where('is_publish', 1)
				->where( function( $query ){
					$query->where("end",">=",now()->format("Y-m-d"))
							->orWhere("end",null);
				})
									->orderBy('created_at','desc');
    }

    public function scopeHighlight( $query ){
        return $query->where('is_highlight', 1);
    }

    public function getDisplayThumbAttribute(){
        if( $this->thumb ){
            return \Storage::url( $this->thumb );
        }
        return null;
    }

    public function getDisplayImgAttribute(){
        if( $this->img ){
            return \Storage::url( $this->img );
        }
        return null;
    }

    public function getDisplayPeriodAttribute(){
        return $this->start->format('d M Y').' - '.( $this->end ? $this->end->format('d M Y') : 'Indefinite' );
    }

    public function getDisplayPostDateAttribute(){
        return $this->post_date->format('d M Y');
    }
}
