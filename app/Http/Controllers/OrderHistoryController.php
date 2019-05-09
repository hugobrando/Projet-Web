<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderHistoryController extends Controller
{
    public function show(){
    	$EnCours = Order::getOrderEnCours();
    	$finish = Order::getOrderFinish();
    	return view('orderHistory')->with(['EnCours' => $EnCours, 'finish' => $finish]);
    }

    public function finishOrder(Request $request){
    	Order::finishOrder();
    	return back();
    }
}
