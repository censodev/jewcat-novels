<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cart;
use Session;

class CartController extends Controller
{
	protected $defTransportFee = 10000;

    public function index(Request $request) {
    	$cartList = Cart::content();
    	$itemList = [];
    	foreach ($cartList as $cartItem) {
    		$item = (array)DB::table('novels')
    			->where('id', $cartItem->id)
    			->first();
    		$item['qty'] = $cartItem->qty;
    		$item['now_price'] = $cartItem->price;
    		$itemList[] = (object)$item;
    	}

    	$transCode = DB::table('transport_codes')->where('code_status', 1)->get();

    	Session::put('transportFee', $this->defTransportFee);

    	return view('frontend.cart', compact('itemList', 'transCode'));
    }

    public function addToCart(Request $request) {
		$novel = DB::table('novels')
    		->where('id', $request->id)
    		->first();

		Cart::add([
			'id' => $novel->id, 
			'name' => $novel->novel_name, 
			'price' => round($novel->novel_price * (100 - $novel->novel_sale_off) / 100, -3),
			'qty' => 1, 
			'weight' => 0
		]);
		
    	return json_encode(Cart::content());
    }

    public function insQuantity(Request $request) {
    	$novel = DB::table('novels')
    		->where('id', $request->id)
    		->first();

		$arr = Cart::search(function($cartItem, $rowId) use ($request) {
			return $cartItem->id == $request->id;
		});


		foreach ($arr as $obj) {
			if($obj->qty < $novel->novel_quantity) {
				Cart::add([
					'id' => $novel->id, 
					'name' => $novel->novel_name, 
					'price' => round($novel->novel_price * (100 - $novel->novel_sale_off) / 100, -3),
					'qty' => 1, 
					'weight' => 0
				]);
				$rs = (object) array('status' => true, 'transfee' => Session::get('transportFee'), 'qty' => $obj->qty + 1, 'subtotal' => Cart::subtotal(false, '', '.'));
			}
			else {
				$rs = (object) array('status' => false, 'transfee' => Session::get('transportFee'), 'qty' => $obj->qty, 'subtotal' => Cart::subtotal(false, '', '.'));
			} 
			break;
		}

    	
    	return json_encode($rs);
    }

    public function desQuantity(Request $request) {
    	$novel = DB::table('novels')
    		->where('id', $request->id)
    		->first();

		$arr = Cart::search(function($cartItem, $rowId) use ($request) {
			return $cartItem->id == $request->id;
		});

		foreach ($arr as $obj) {
			if($obj->qty > 1) {
				Cart::add([
					'id' => $novel->id, 
					'name' => $novel->novel_name, 
					'price' => round($novel->novel_price * (100 - $novel->novel_sale_off) / 100, -3),
					'qty' => -1, 
					'weight' => 0
				]);
				$rs = (object) array('status' => true, 'transfee' => Session::get('transportFee'), 'qty' => $obj->qty - 1, 'subtotal' => Cart::subtotal(false, '', '.'));
			}
			else $rs = (object) array('status' => false, 'transfee' => Session::get('transportFee'), 'qty' => $obj->qty, 'subtotal' => Cart::subtotal(false, '', '.'));
			break;
		}

    	
    	return json_encode($rs);
    }

    public function remove(Request $request) {
		$arr = Cart::search(function($cartItem, $rowId) use ($request) {
			return $cartItem->id == $request->id;
		});

		foreach ($arr as $obj) {
			Cart::remove($obj->rowId);
			break;
		}

		$rs = (object) array('subtotal' => Cart::subtotal(false, '', '.'), 'transfee' => Session::get('transportFee'));
		return json_encode($rs);
    }

    public function setTransportFee(Request $request) {
    	Session::put('transportFee', 0);
    	if($request->id > 0) {
    		Session::put('transportFee', 0);
    		Session::put('transportCode', $request->id);
    		$rs = (object) array('status' => true, 'transfee' => Session::get('transportFee'), 'subtotal' => Cart::subtotal(false, '', '.'));
    		return json_encode($rs);
    	} 
    	else {
    		Session::put('transportFee', $this->defTransportFee);
    		$rs = (object) array('status' => false, 'transfee' => Session::get('transportFee'), 'subtotal' => Cart::subtotal(false, '', '.'));
    		return json_encode($rs);
    	}	
    }

    public function getPayment() {
    	return view('frontend.payment');
    }

    public function postPayment(Request $request) {
    	
    }
}
