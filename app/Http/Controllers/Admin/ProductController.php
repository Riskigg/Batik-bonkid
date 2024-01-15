<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Validator;
use File;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->latest()->get();
        $data['product'] = $product;
        return view('admin.product.index', $data);
    }

    public function create()
    {
        $category = Category::latest()->get();
        $data['category'] = $category;
        return view('admin.product.form',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        $input = $request->all();

        $data_product = [
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'qty' => $request->qty,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('product', $request->image);
            $data_product['image'] = $image;
        }

        // dd($data_product);

        Product::create($data_product);

        return redirect()->route('admin.product.index')
                        ->with('success','Product created successfully.');
    }

    public function edit(product $product, $id)
    {
        $detail = Product::where('id', $id)->first();
        $category = Category::latest()->get();
        $data['category'] = $category;
        $data['detail'] = $detail;
        $data['edit_mode'] = true;

        return view('admin.product.form', $data);
    }

    public function update(Request $request, product $product, $id)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::findorfail($id);

        $data_product = [
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'price' => $request->price,
            'qty' => $request->qty,
            'category_id' => $request->category_id,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('product', $request->image);
            $data_product['image'] = $image;
            // dd($object['avatar']);
            if ($product->image) {
                File::delete('./uploads/' . $product->image);
            }
        }

        $product->update($data_product);

        //dd($galery->toArray());

        return redirect()->route('admin.product.index')
            ->with('success', 'Product updated succes sfully');
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        if ($product) {
            $product->delete();
            File::delete('./uploads/' . $product->image);
        }

        return redirect()->route('admin.product.index')
            ->with('success', 'product deleted successfully');
    }
}
