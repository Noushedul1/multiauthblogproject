<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Admin\Post;
use App\Models\CommentLike;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    // start of index
    public function index() {
        $posts = Post::where('status',1)->paginate(2);
        $categories = Category::all();
        $editorsPick = Post::where('status',1)->latest()->first();
        $trendingPosts = Post::where('status',1)->take(3)->latest()->get();
        $popularPost = Post::where('status',1)->orderBy('title','ASC')->first(); //i think it would be based on amount of likes
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
        ->paginate(3);
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

    // start of contact
    public function contactStore(Request $request) {
        $request->validate([
            'subject'=>'required',
            'message'=>'required'
        ]);
        Contact::create([
            'user_id' => Auth::user()->id,
            'subject' => $request->subject,
            'message' => $request->message
        ]);
        return redirect()->back();
    }
    // end of contact

    // start of like
    public function commentLikes($id) {
        CommentLike::create([
            'user_id' => Auth::user()->id,
            'comment_id' => $id
        ]);
        return redirect()->back();
    }
    // end of like
    // start of like
    public function commentUnlikes($id) {
        CommentLike::where('user_id',Auth::user()->id)->where('comment_id',$id)->delete();
        return redirect()->back();
    }
    // end of like
}
