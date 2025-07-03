<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscribers extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subscribers';
    protected $fillable = ['email'];

    public function getDisplayCreatedAtAttribute()
    {
        return $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : null;
    }
}
