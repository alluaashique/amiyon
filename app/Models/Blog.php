<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'blogs';
    protected $appends = ['short_description'];
    protected $fillable = [
        'title',
        'slug',
        'date',
        'author',
        'content',
        'image',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
            // $model->short_description = $model->generateShortDescription($model->description);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
            // $model->short_description = $model->generateShortDescription($model->description);
        });
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id', 'id');
    }

   

    public function getShortDescriptionAttribute()
    {
        return Str::limit($this->content, 100);
    }

    

   
}