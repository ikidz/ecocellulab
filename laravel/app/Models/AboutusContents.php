<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutusContents extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'aboutus_contents';
    protected $fillable = [
        'banner_img',
        'page_title',
        'home_section_title',
        'home_section_img',
        'home_section_content',
        'story_img',
        'story_content',
        'benefits',
        'vision_img',
        'vision_content',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'is_publish'
    ];
    protected $casts = [
        'benefits' => 'array',
        'is_publish' => 'boolean',
    ];

    public function scopePublished(){
        return $this->where('is_publish', 1)
                ->limit(1)
                ->orderBy('created_at', 'desc');
    }

    public function getDisplayHomeSectionImgAttribute(){
        if( $this->home_section_img ){
            return \Storage::disk('public')->url( $this->home_section_img );
        }
        return null;
    }

    public function getDisplayBannerImgAttribute(){
        if( $this->banner_img ){
            return \Storage::disk('public')->url( $this->banner_img );
        }
        return null;
    }

    public function getDisplayStoryImgAttribute(){
        if( $this->story_img ){
            return \Storage::disk('public')->url( $this->story_img );
        }
        return null;
    }

    public function getDisplayVisionImgAttribute(){
        if( $this->vision_img ){
            return \Storage::disk('public')->url( $this->vision_img );
        }
        return null;
    }

    public function getDisplayMetaImageAttribute(){
        if( $this->meta_image ){
            return \Storage::disk('public')->url( $this->meta_image );
        }
        return null;
    }

    // public function getDisplayBenefitsAttribute(){
    //     // return $this->benefits ? json_decode($this->benefits, true) : [];
    // }
}
