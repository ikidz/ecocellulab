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
        'review_source',
        'img',
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

    public function getDisplayImgAttribute(){
        if( $this->img && file_exists( public_path('storage').'/'.$this->img ) ){
            return \Storage::disk('public')->url( $this->img );
        }
        return asset('assets/images/logo_v.svg');
    }

    public function getMaskedNameAttribute(){
        $name = $this->name;
        if( strlen($name) <= 2 ){
            return str_repeat('*', strlen($name));
        }
        $firstChar = substr($name, 0, 3);
        $lastChar = substr($name, -1);
        $maskedMiddle = str_repeat('*', strlen($name) - 2);
        return $firstChar . $maskedMiddle . $lastChar;
    }

    public function getMaskedEmailAttribute(){
        $email = $this->email;
        $atPosition = strpos($email, '@');
        if ($atPosition === false) {
            return $email; // Invalid email format
        }
        $localPart = substr($email, 0, $atPosition);
        $domainPart = substr($email, $atPosition);
        if( strlen($localPart) <= 2 ){
            $maskedLocal = str_repeat('*', strlen($localPart));
        }else{
            $firstChar = substr($localPart, 0, 1);
            $lastChar = substr($localPart, -1);
            $maskedMiddle = str_repeat('*', strlen($localPart) - 2);
            $maskedLocal = $firstChar . $maskedMiddle . $lastChar;
        }
        return $maskedLocal . $domainPart;
    }

    public function getDisplayReviewedAtAttribute(){
        return $this->created_at ? $this->created_at->format('F j, Y @ H:i') : null;
    }
}
