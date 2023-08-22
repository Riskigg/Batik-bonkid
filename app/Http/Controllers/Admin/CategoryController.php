<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Validator;
use File;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        $data['category'] = $category;
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);
        

        $input = $request->all();

        $data_category = [
            'name' => $request->name,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('category', $request->image);
            $data_category['image'] = $image;
        }

        // dd($data_category);
    
        Category::create($data_category);

        return redirect()->route('admin.category.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category, $id)
    {
        $detail = Category::where('id', $id)->first();
        $data['detail'] = $detail;
        $data['edit_mode'] = true;
        
        return view('admin.category.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category, $id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $category = Category::findorfail($id);
        

        $data_category = [
            'name' => $request->name,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('category', $request->image);
            $data_category['image'] = $image;
            // dd($object['avatar']);
            if ($category->image) {
                File::delete('./uploads/' . $category->image);
            }
        }

        $category->update($data_category);

        //dd($galery->toArray());

        return redirect()->route('admin.category.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        if ($category) {
            $category->delete();
            File::delete('./uploads/' . $category->image);
        }

        return redirect()->route('admin.category.index')
            ->with('success', 'category deleted successfully');
    }
}
