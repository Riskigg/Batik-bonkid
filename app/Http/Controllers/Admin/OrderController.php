<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Validator;
use File;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Detail_order;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::latest()->get();
        $data['order'] = $order;
        return view('admin.order.index', $data);
    }

    public function show($id)
    {
        $detail = Order::where('id',$id)->with('detail_order.product')->first();
        $data['detail'] = $detail;
        // dd($detail->toArray());
        return view('admin.order.show', $data);
    }

    public function get_order(Request $request)
    {
        $order = Order::find($request->id);

        return response()->json($order, 200);
    }

    public function change_status_order(Request $request)
    {
        $detail = Order::find($request->id);
        $data['detail'] = $detail;

        $data = [
            'status' => 1,
        ];

        $detail->update($data);

        return redirect()->route('admin.order.index')
            ->with('success', 'Berhasil mengubah status Order.');
    }
}
