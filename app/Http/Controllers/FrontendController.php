<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;

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
        // $comments = Comment::where('post_id',$id)->get();
        $commentObj = new Comment();
        $comments = $commentObj->join('users','users.id','=','comments.user_id')
        ->select('comments.*','users.name as user_name')
        ->where('comments.post_id',$id)
        ->get();
        return view('pages.post_details.post_details',[
            'post'=>$post,
            'comments'=>$comments
        ]);
    }
    // end of post Details
    // start of comment
    public function comment(Request $request,$id) {
        $request->validate([
            'comment' => 'required'
        ]);
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'comment' => $request->comment
        ]);
        return redirect()->back();
    }
    // end of comment
}
