<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;

class SaleHistoryController extends Controller
{
    function show(){
    	$sales = Sell::getAllSell();

    	return view('saleHistory')->with(['sales' => $sales]);
    }
}
