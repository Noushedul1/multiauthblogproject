<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.create_category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::paginate(5);
        return view('admin.category.category',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // way 1

        // $request->validated();
        // Category::create([
        //     'name'=>$request->name,
        //     'description'=>$request->description,
        // ]);

        // way 2

        // $request->validated();
        // Category::create($request->only('name','description'));

        // way 3

        Category::create($request->validated());
        $notification = array('message'=>'Category Created','alert-type'=>'success');
        return redirect()->route("admin.category.create")->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::select('id','name','description')->findOrFail($id);
        return view('admin.category.edit_category',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        Category::findOrFail($id)->update($request->validated());
        $notification = array('message'=>'Category Updated','alert-type'=>'success');
        return redirect()->route('admin.category.create')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        $notification = array('message'=>'Category Deleted','alert-type'=>'error');
        return redirect()->route('admin.category.create')->with($notification);
    }
}
