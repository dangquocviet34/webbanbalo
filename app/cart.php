<?php
namespace App;
class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuaty=0;

    public function __constant($cart){
        if($cart){
            $this->products =  $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuaty = $cart->totalQuaty;

        }
    }

    //Thêm mới giỏ hàng
    public function AddCart($products, $id){
        $newProduct=['quanty'=>0,'price'=>0, 'productinfo'=>$products];
        if($this->products){
            if(array_key_exists($id, $products)){
                $newProduct=$products($id);
            }
        }
        $newProduct['quanty']++;
        $newProduct['price']=$newProduct['quanty']*$products->price;
        $this->products[$id]= $newProduct;
        $this->totalPrice += $products->price;
        $this->totalQuaty++;

    }


    //Cập nhật giỏ hàng


    //Xóa snar phẩm khỏi giỏ hàng

    //Xóa hết sản ph
  
}
?>