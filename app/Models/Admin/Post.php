<?php

namespace App\Models\Admin;

use App\Models\Comment;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'sub_title',
        'description',
        'status',
        'image'
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
