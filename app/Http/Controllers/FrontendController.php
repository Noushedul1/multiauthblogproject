<?php

namespace App\Http\Controllers;

use App\Models\Admin\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // start of index
    public function index() {
        $posts = Post::all();
        return view('welcome',
        [
            'posts'=>$posts
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
    public function postDetails() {
        return view('pages.post_details.post_details');
    }
    // end of post Details
}
