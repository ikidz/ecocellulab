<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReviews extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_reviews';
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'rating',
        'review',
        'is_approved',
        'is_highlight',
    ];
    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
    ];

    public function scopeDisplayed($query){
        return $query->where('is_approved', 1)
                     ->orderBy('created_at', 'desc');
    }
    public function scopeHighlighted( $query ){
        return $query->where('is_highlight', 1)
                        ->where('is_approved', 1)
                        ->orderBy('created_at', 'desc');
    }
    public function product(){
        return $this->belongsTo('App\Models\Products', 'product_id', 'id');
    }
}
