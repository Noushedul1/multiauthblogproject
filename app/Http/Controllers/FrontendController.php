<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\{
    Post,
    Category
};

class FrontendController extends Controller
{
    // start of index
    public function index() {
        $posts = Post::where('status',1)->paginate(2);
        $categories = Category::all();
        $editorsPick = Post::latest()->first();
        $trendingPosts = Post::take(3)->latest()->get();
        $popularPost = Post::orderBy('title','ASC')->first(); //i think it would be based on amount of likes
        return view('welcome',
        [
            'posts'=>$posts,
            'categories'=>$categories,
            'editorsPick'=>$editorsPick,
            'trendingPosts'=>$trendingPosts,
            'popularPost'=>$popularPost
        ]
    );
    }
    // end of index

    // start of contact
    public function contact() {
        return view('pages.contact.contact');
    }
    // end of contact

    // start of post Details
    public function postDetails($id) {
        $post = Post::findOrFail($id);
        return view('pages.post_details.post_details',['post'=>$post]);
    }
    // end of post Details
}
