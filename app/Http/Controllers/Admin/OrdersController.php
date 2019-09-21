<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class OrdersController extends Controller
{
    public function allList() {
    	$ordersList = DB::table('orders')->paginate(10);
    	return view('admin.orders-list', compact('ordersList'));
    }
}
