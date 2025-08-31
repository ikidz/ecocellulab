<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'contacts';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'subject',
        'message',
        'is_read',
        'ip_address',
        'user_agent'
    ];
    protected $casts = [
        'is_read' => 'boolean',
    ];
    public function getDisplayNameAttribute()
    {
        return trim("{$this->fname} {$this->lname}");
    }
}
