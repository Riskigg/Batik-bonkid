<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Detail_order;

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
    public function order(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        

        $order = [
            'name' => $request->name,
            'address' => $request->address,
            'total' => $request->total,
            'phone' => $request->phone,
        ];
        $order_id = Order::create($order)->id;
        foreach ($request->product_id as $key => $value) {
            $detail[$key]['product_id'] = $request->product_id[$key];
            $detail[$key]['order_id'] = $order_id;
            $detail[$key]['qty'] = $request->qty[$key];
            $detail[$key]['price'] = $request->price[$key];
            $detail[$key]['subtotal'] = $request->price[$key]*$request->qty[$key];
        }
        Detail_order::insert($detail);
        // dd($detail);
        return redirect()->route('admin.product.index');
        
    }
    
}
