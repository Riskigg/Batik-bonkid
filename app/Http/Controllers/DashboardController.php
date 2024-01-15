<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data['page_title'] = "Admin";
        return view('admin.dasbor', $data);
    }

    public function alamat()
    {
        $order = Order::latest()->get();
        $data['order'] = $order;
        return view('admin.dataalamat', $data);
    }
}
