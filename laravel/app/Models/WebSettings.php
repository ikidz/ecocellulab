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
        $type = strtolower($this->type ?? '');
        $locale = substr(app()->getLocale(), 0, 2); // "en", "th"
        
        switch( $this->type ){
            case 'text' :
            case 'longText' :
                // Safely fetch localized value, fallback to TH, then empty string
                $raw = $this->getAttribute('value_' . $locale)
                    ?? $this->getAttribute('value_th')
                    ?? '';

                // Replace {highlight}...{ } markers with themed span
                return preg_replace(
                    ['~\{~', '~\}~'],
                    ['<span class="theme_color">', '</span>'],
                    $raw
                );
            break;
            case 'image' :
                $storage = \Storage::disk('public');
                if( $this->attributes['img'] && $storage->get( $this->attributes['img'] ) ){
                    return $storage->url( $this->attributes['img'] );
                }
                return null;
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
