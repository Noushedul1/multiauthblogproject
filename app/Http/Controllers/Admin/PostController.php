<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.post.create_post',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::with('category')->paginate(3);
        return view('admin.post.post',['posts'=>$posts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $request->validated();
        $image = $request->file('image');
        if($request->hasFile('image')) {
            $filename = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            $image->storeAs('public/post_images',$fileNameToStore);
            // $myimage = Image::make($image);
            // $myimage->resize(600,360);
            // $myimage->save();
        }else {
            $fileNameToStore = 'noimage.jpg';
        }
        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = Str::slug($request->title);
        $post->sub_title = $request->sub_title;
        $post->description = $request->description;
        $post->image = $fileNameToStore;
        $post->save();
        $notification = array('message'=>'Post successfully Created','alert-type'=>'success');
        return redirect()->route('admin.post.create')->with($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        // return $category;
        return view('admin.post.post_details',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::select('id','name')->get();
        return view('admin.post.edit_posts',[
            'post'=>$post,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $request->validated();
        $image = $request->file('image');
        if($request->hasFile('image')) {
            $filename = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;
            $image->storeAs('public/post_images',$fileNameToStore);
        }
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = Str::slug($request->title);
        $post->sub_title = $request->sub_title;
        $post->description = $request->description;
        // $post->status = $request->status;
        if($request->hasFile('image')) {
            if($post->image != 'noimage.jpg') {
                Storage::delete('public/post_images/'.$post->image);
                $post->image = $fileNameToStore;
            }
            else {
                $post->image = $fileNameToStore;
            }
        }
        // $post->image = $fileNameToStore;
        $post->save();
        $notification = array('message'=>'Post Updated','alert-type'=>'success');
        return redirect()->route('admin.post.create')->with($notification);
    }
    // start of  status update
    public function postStatus($id) {
        $post = Post::findOrFail($id);
        if($post->status == 0) {
            $post->status =1;
        }else {
            $post->status = 0;
        }
        $post->save();
        return redirect()->route('admin.post.create');
    }
    // end of status update

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if($post->image != 'noimage.jpg') {
            Storage::delete('public/post_images/'.$post->image);
        }
        $post->delete();
        $notification = array('message'=>'Post Deleted','alert-type'=>'error');
        return redirect()->route('admin.post.create')->with($notification);
    }

}
