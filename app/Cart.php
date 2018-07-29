<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($items,$id,$qty,$price){
        $storedItem = ['qty'=>0,'items'=>$items,'price'=>0,'singleprice'=>0];

        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty'] = $storedItem['qty']+$qty;
        $storedItem['price'] = $storedItem['price'] + $price;
        $storedItem['singleprice'] = $price;
        $this->items[$id]=$storedItem;
        $this->totalQty = $this->totalQty+$qty;
        $this->totalPrice = $this->totalPrice+$price;

    }

    public function changeQty($id,$qty,$price){
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
                $temp = $storedItem['qty'];
                $oldPrice = $storedItem['price'];
                $newPrice = $qty*$price;
                $storedItem['qty'] = $qty;
                $storedItem['price'] = $qty*$price;
                $this->items[$id]=$storedItem;
                $this->totalQty = $this->totalQty+$qty-$temp;
                $this->totalPrice = $this->totalPrice+$newPrice-$oldPrice;
            }
        }
    }

    public function remove($id){
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $this->totalQty = $this->totalQty - $this->items[$id]['qty'];
                $this->totalPrice = $this->totalPrice - $this->items[$id]['price'];
                $this->items = array_except($this->items,[$id]);
            }
        }
    }
}
