<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;
use DB;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function promotion(){

        $promotions = DB::table('promotions')
            ->join('products', 'products.id', '=', 'promotions.product_id')
            ->select('products.*', 'promotions.*')
            ->get();

        dd($promotions);

        return view('admin.promotion.index',compact('promotions'));
    }
}
