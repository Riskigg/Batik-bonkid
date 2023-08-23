<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $show = 12;
        if ($request->has('keyword')) {
            $data['search'] = true;
            $products = Product::with('category')->whereHas('category', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'.$request->keyword.'%');
            })->orwhere('name', 'LIKE', '%'.$request->keyword.'%')
            ->orwhere('deskripsi', 'LIKE', '%'.$request->keyword.'%')
            ->orderBy('id', 'desc');
            $data['keyword'] = $request->keyword;
        }else{
            $data['search'] = false;
            $products = Product::with('category')->orderBy('id', 'desc');
        }
        $data['page_title'] = "Home";
        $data['products'] = $products->paginate($show);
        $data['i'] = (request()->input('page',1)-1)*$show;
        return view('pages.home.index', $data);
    }
    
}
