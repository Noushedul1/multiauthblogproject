<?php

namespace App\Models\Admin;

use App\Models\Admin\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];
    public function post(){
        return $this->hasMany(Post::class);
    }
}
