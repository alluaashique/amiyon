<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BlogComment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blog_comments';
    protected $appends = ['user_name'];

    protected $fillable = [
        'blog_id',
        'user_id',
        'blog_comment_id',
        'comment',
        'status',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
    public function replies()
    {
        return $this->hasMany(BlogComment::class, 'blog_comment_id', 'id');
    }
    public function getUserNameAttribute()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->value('name');
    }
}
