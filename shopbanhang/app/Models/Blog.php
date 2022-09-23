<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      
        'title',
        'thumbnail',
        'category_id',
        'slug',
        'desc',
        'tags',
        'count_view',
        'user_post',
        'status',
        'address',
        'price_value',
        'end_date',
        'content',
        'meta_desc',
        'meta_title',
        'meta_keyword',
        'display',
        'user_edit',
        'post_type',
        'lang_code',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
