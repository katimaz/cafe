<?php

namespace App\Http\Controllers;

use App\OrderFood;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\PrintCode;
use DB;

class ApiController extends Controller
{
    public function getProducts(Request $request){

        $from = new Carbon($request->from);
        $to = new Carbon($request->to);

        $orderFoods = DB::table('orders')
            ->join('order_foods', 'order_foods.order_id', '=', 'orders.id')
            ->join('menu_products', 'menu_products.id', '=', 'order_foods.product_id')
            ->select('orders.table_id','orders.id as order_id','order_foods.quantity','menu_products.name','menu_products.description')
            ->where('order_foods.created_at','>=',$from->toDateTimeString())
            ->where('order_foods.created_at','<=',$to->toDateTimeString())
            ->where('paid','0')
            ->get();

        $jsonBody = json_encode(
            $orderFoods
        );

        return $jsonBody;
    }

    public function getTotalProducts(Request $request){

        $orderFoods = DB::table('order_foods')
            ->join('menu_products', 'menu_products.id', '=', 'order_foods.product_id')
            ->select(DB::raw('sum(order_foods.quantity) as product_quantity'),'menu_products.name as product_name')
            ->groupBy('product_name')
            ->get();

        $jsonBody = json_encode(
            $orderFoods
        );

        return $jsonBody;
    }

    public function getPrintCode(Request $request){
        if($request->count){
            $printCodes = [];

            for($i = 1 ;$i<=$request->count;$i++){
                $dt = Carbon::now();
                $code = str_random(2).substr(sha1($dt->timestamp),rand (5,10),rand (10,15)).str_random(3);
                $printCode = PrintCode::create(['code'=>$code]);
                $printCodes = array_prepend($printCodes,$printCode->code);
            }

            $jsonBody = json_encode(
                $printCodes
            );

            return $jsonBody;
        }
        return "Missing Parameter";
    }
}
