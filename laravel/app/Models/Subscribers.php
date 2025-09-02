<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscribers extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subscribers';
    protected $fillable = [
        'email',
        'source_page',
        'source_id'
    ];
    protected $casts = [
        'source_id' => 'integer'
    ];

    public function getDisplayCreatedAtAttribute()
    {
        return $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : null;
    }

    public function getDisplaySourcePageAttribute()
    {
        switch( $this->source_page ) {
            case 'research':
                $research = \App\Models\Researches::find($this->source_id);
                return $research ? 'Research: '.$research->title : 'Research';
            case 'article':
                $article = \App\Models\Articles::find($this->source_id);
                return $article ? 'Article: '.$article->title : 'Article';
            default:
                return '-'; break;
        }
        return $this->source_page ? $this->source_page : '-';
    }

    public function article(){
        return $this->hasOne(\App\Models\Articles::class, 'id', 'source_id');
    }

    public function research(){
        return $this->hasOne(\App\Models\Researches::class, 'id', 'source_id');
    }
}
