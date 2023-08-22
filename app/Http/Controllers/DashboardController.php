<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data['page_title'] = "Admin";
        return view('admin.dasbor', $data);
    }
}
