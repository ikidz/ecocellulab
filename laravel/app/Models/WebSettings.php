<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebSettings extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'web_settings';
    protected $fillable = [
        'type',
        'title',
        'key',
        'img',
        'value_th',
        'value_en'
    ];
    
    public function getValueAttribute(){
        switch( $this->type ){
            case 'text' :
            case 'longText' :
                $pattern = array('/{/', '/}/');
                $replace = array('<span class="theme_color">', '</span>');
                return preg_replace($pattern, $replace, $this->attributes['value_'.app()->getLocale()]);
            break;
            case 'image' :
                $storage = \Storage::disk('public');
                if( $this->attributes['img'] && $storage->get( $this->attributes['img'] ) ){
                    return $storage->url( $this->attributes['img'] );
                }
            break;
            default : 
                return $this->attributes['value_th'];
        }
    }

    public function getDisplayImgAttribute(){
        if( $this->img && \Storage::disk('public')->get( $this->img ) ){
            return \Storage::url( $this->img );
        }
        return null;
    }
}
