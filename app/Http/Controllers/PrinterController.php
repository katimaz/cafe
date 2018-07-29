<?php

namespace App\Http\Controllers;

use App\OrderFood;
use App\Traits\Printer;
use Carbon\Carbon;
use App\PrintCode;

class PrinterController extends Controller
{
    use Printer;


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
