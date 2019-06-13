<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Cart extends Model
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
	public function add($item, $id){
		$sanpham = ['qty'=>0, 'price' => $item->price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$sanpham = $this->items[$id];
			}
		}
		$sanpham['qty']++;
		$sanpham['price'] = $item->price * $sanpham['qty'];
		$this->items[$id] = $sanpham;
		$this->totalQty ++;
		$this->totalPrice += $item->price;
	}
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
