<?php

namespace App\Http\Controllers;

use App\Order;
use App\Traits\Printer;
use Carbon\Carbon;
use App\PrintCode;
use App\Printer as Printers;
use DB;
use Illuminate\Http\Request;

class PrinterController extends Controller
{
    use Printer;


    public function orderTablePrintReceipt(Request $request){


        $order = Order::where('table_id',$request->table_id)->where('paid',0)->first();

        $orderFoods  = DB::select('SELECT orders.id,order_foods.product_id,sum(order_foods.quantity) as sum_quantity,sum(order_foods.price) as sum_price,menu_products.name,menu_products.description,menu_products.image_url,orders.paid FROM `orders`,`order_foods`,menu_products 
                   WHERE orders.id = order_foods.order_id 
                   and order_foods.product_id = menu_products.id
                   and orders.restaurant_id = :restaurant_id
                   and orders.id = :id
                   group by orders.id,order_foods.product_id', ['id' => $order->id,'restaurant_id' => 1]);

        $totalPrice = number_format($order->price*1.1, 1, '.', ',');
        $ServiceCharge = $order->price*0.1;

        $printData = '<CB>Sean Cafe</CB><BR><BR>';
        $printData .= '地址: 九龍尖沙咀漆咸道南29-31號溫莎大廈地下12號A號舖';
        $printData .= '<BR>';
        $printData .= '電話: 6676 9679';
        $printData .= '<BR>';
        $printData .= '--------------------------------<BR>';
        $printData .= '<B>單號 : ' .$order->id.$order->table_id.'</B><BR><BR>';
        $printData .= '<B>桌號 : ' .$order->table_id.'</B><BR><BR>';
        $printData .= '人數 : ' .$order->people.'<BR><BR>';
        $printData .= '日期 : ' .date('Y-m-d H:i:s').'<BR><BR>';
        $printData .= '<RIGHT>    　　　　　 數量  價錢 </RIGHT><BR>';
        $printData .= '--------------------------------<BR>';
        foreach($orderFoods as $orderFood){
            $priceSpace ='';
            if(strlen($orderFood->sum_price)==2){
                $priceSpace =' ';
            }elseif(strlen($orderFood->sum_price)==1){
                $priceSpace ='  ';
            }

            $printData .= '<RIGHT><BOLD><L>'.$orderFood->name.'　 '. $orderFood->sum_quantity.'  '.$priceSpace.'$'.$orderFood->sum_price.'</L></BOLD></RIGHT><BR>';
        }
//        foreach($orderFoods as $orderFood){
////            dd(mb_strlen($orderFood->name));
////            dd(mb_substr ($orderFood->name,0,(mb_strlen($orderFood->name)/2)));
////            dd(mb_substr ($orderFood->name,(mb_strlen($orderFood->name)/2),mb_strlen($orderFood->name)));
//
//            if(mb_strlen($orderFood->name) > 10){
//                $printData .= '<BOLD><L>'.mb_substr ($orderFood->name,0,10) . '              '.mb_substr ($orderFood->name,10,mb_strlen($orderFood->name)).'　                 ' .$orderFood->sum_quantity. '  $' .$orderFood->sum_price. '</L></BOLD><BR>';
//            }else{
//                $space = 34;
//                $space = $space - strlen($orderFood->name);
//                $text ='';
//                for($i =0; $i < $space;$i++){
//                    $text .= ' ';
//                }
//                $printData .= '<RIGHT><BOLD><L>'.$orderFood->name . $text . $orderFood->sum_quantity. '  $' .$orderFood->sum_price . '</L></BOLD></RIGHT><BR>';
//            }
//        }
        $printData .= '--------------------------------<BR>';
        $printData .= '<RIGHT>小計　　　　 　           $' . $order->price. '</RIGHT><BR>';
        $printData .= '<RIGHT>服務費　　　　 　        $' . $ServiceCharge. '</RIGHT><BR>';
        $printData .= '--------------------------------<BR>';
        $printData .= '<RIGHT><B>合計　　$' . $totalPrice. '</B></RIGHT><BR>';
        $printData .= '<BR>';
        $printData .= '<BR>';
        $printData .= '<BR>';
        $printData .= '<RIGHT>Powered by QuickOrder     </RIGHT><BR>';
        $printData .= '<RIGHT>Please Visit http://hkqos.com   </RIGHT><BR>';
        $printData .= '<BR>';
        $printData .= '<BR>';

        $printers = Printers::where('printer_type_id','=','1')->get();

        foreach($printers as $printer){

            $this->setPrinter($printer->account, $printer->account_key, $printer->printer_sn);
            $this->getPrint($printData);
        }

        echo true;
    }


    public function orderTablePrintEnglishReceipt(Request $request){


        $order = Order::where('table_id',$request->table_id)->where('paid',0)->first();

        $orderFoods  = DB::select('SELECT orders.id,order_foods.product_id,sum(order_foods.quantity) as sum_quantity,sum(order_foods.price) as sum_price,menu_products.name,menu_products.en_name,menu_products.description,menu_products.image_url,orders.paid FROM `orders`,`order_foods`,menu_products 
                   WHERE orders.id = order_foods.order_id 
                   and order_foods.product_id = menu_products.id
                   and orders.restaurant_id = :restaurant_id
                   and orders.id = :id
                   group by orders.id,order_foods.product_id', ['id' => $order->id,'restaurant_id' => 1]);

        $totalPrice = number_format($order->price*1.1, 1, '.', ',');
        $ServiceCharge = $order->price*0.1;

        $printData = '<CB>Sean Cafe</CB><BR><BR>';
        $printData .= 'Address: 九龍尖沙咀漆咸道南29-31號溫莎大廈地下12號A號舖';
        $printData .= '<BR>';
        $printData .= 'Tel: 6676 9679';
        $printData .= '<BR>';
        $printData .= '--------------------------------<BR>';
        $printData .= '<B>Order No. : ' .$order->id.$order->table_id.'</B><BR><BR>';
        $printData .= '<B>Table No. : ' .$order->table_id.'</B><BR><BR>';
        $printData .= 'People : ' .$order->people.'<BR><BR>';
        $printData .= 'Date : ' .date('Y-m-d H:i:s').'<BR><BR>';
        $printData .= '<RIGHT>    　　　Quantity  Price </RIGHT><BR>';
        $printData .= '--------------------------------<BR>';
        foreach($orderFoods as $orderFood){
            $priceSpace ='';
            if(strlen($orderFood->sum_price)==2){
                $priceSpace =' ';
            }elseif(strlen($orderFood->sum_price)==1){
                $priceSpace ='  ';
            }

            $printData .= '<RIGHT><BOLD><L>'.$orderFood->en_name.'　 '. $orderFood->sum_quantity.'  '.$priceSpace.'$'.$orderFood->sum_price.'</L></BOLD></RIGHT><BR>';
        }

        $printData .= '--------------------------------<BR>';
        $printData .= '<RIGHT>Total　　 　           $' . $order->price. '</RIGHT><BR>';
        $printData .= '<RIGHT>Services Charges　　　　 　   $' . $ServiceCharge. '</RIGHT><BR>';
        $printData .= '--------------------------------<BR>';
        $printData .= '<RIGHT><B>Sub Total　$' . $totalPrice. '</B></RIGHT><BR>';
        $printData .= '<BR>';
        $printData .= '<BR>';
        $printData .= '<BR>';
        $printData .= '<RIGHT>Powered by QuickOrder     </RIGHT><BR>';
        $printData .= '<RIGHT>Please Visit http://hkqos.com   </RIGHT><BR>';
        $printData .= '<BR>';
        $printData .= '<BR>';

        $printers = Printers::where('printer_type_id','=','1')->get();

        foreach($printers as $printer){

            $this->setPrinter($printer->account, $printer->account_key, $printer->printer_sn);
            $this->getPrint($printData);
        }

        echo true;
    }

    public function printKey($count)
    {
        if ($count) {
            for ($i = 1; $i <= $count; $i++) {

                $keyCode = $this->generateKey();
                while (!$keyCode) {
                    $keyCode = $this->generateKey();
                }

                $printData = '密碼　　　　　        <BR>';
                $printData .= '--------------------------------<BR>';
                $printData .= $keyCode->code . '<BR>';
                $printData .= '--------------------------------<BR>';

                $this->setPrinter("bjtuwangjia@gmail.com", "ebIRPMY3Zr5ISM2u", "918501940");
                $this->getPrint($printData);
            }
        }

        return redirect('admin/showKey');
    }

    public function printOrder($id)
    {

        $orderFood = OrderFood::join('orders', 'orders.id', 'order_foods.order_id')
            ->join('menu_products', 'menu_products.id', 'order_foods.product_id')
            ->select('*', 'order_foods.quantity as order_food_quantity')
            ->where('order_foods.id', $id)
            ->first();
        $printData = '<CB>QuickOrder</CB><BR><BR>';
        $printData .= '<CB>送餐單</CB><BR>';
        $printData .= '名稱　　　　　 桌號  數量 <BR>';
        $printData .= '--------------------------------<BR>';
        $printData .= $orderFood->name . '　　　　 　' . $orderFood->table_id . '   ' . $orderFood->order_food_quantity . '<BR>';
        $printData .= '--------------------------------<BR>';
        $printData .= '<QR>http://www.hkqos.com</QR>';//把二维码字符串用标签套上即可自动生成二维码;

        $this->setPrinter("bjtuwangjia@gmail.com", "ebIRPMY3Zr5ISM2u", "918508667");
        $this->getPrint($printData);

        $orderFood = OrderFood::find($id);
        $orderFood->printed = 1;
        $orderFood->save();

        return redirect('order/kitchen');
    }

    private function generateKey()
    {
        $dt = Carbon::now();
        $code = str_random(1) . substr(sha1($dt->timestamp), 8, 4) . str_random(1);
        $keyCode = PrintCode::where(['code' => $code])->get();

        if (!count($keyCode)) {
            return PrintCode::create(['code' => $code]);
        } else {
            return false;
        }
    }
}
