<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Products;
use App\Order;
use Session;
use App\Product_Detail;
use Auth;
class PageController extends Controller
{
    public function getIndex(){
        $product = Products::select('id','name','price','image','cate_id','intro')->paginate(12);
        return view('webmoi.index',compact('product'));
    }
    public function getDetail($id){
        $data = Products::select('id','name','price','image','cate_id','intro')->where('cate_id',$id)->paginate(12);
        return view('webmoi.product',compact('data'));
    }
    public function getCart(){
        return view('webmoi.cart');
    }
    public function chiTietSanPham($id){
        $data = Products::select('id','name','price','image','cate_id','intro')->where('id',$id)->get()->toArray();
        $image_detail = Product_Detail::select('image')->where('product_id',$id)->get()->toArray();
        $sp_cungloai = Products::select('id','name','price','image','cate_id','intro')->where('cate_id',$data[0]['cate_id'])->take(4)->get()->toArray();
        return view('webmoi.detail',compact('data','image_detail','sp_cungloai'));
    }
    public function search(Request $request){
        $product=Products::where('name','like','%'.$request->key.'%')->orWhere('price',$request->key)->get()->toArray();
        return view('webmoi.getSearch',compact('product'));
    }
    public function postOrder(Request $request){
        session_start();
        $data = Session('cart')->items;
        foreach($data as $key => $item){
            $order = new Order();
            $order->tenkh = $_SESSION['name'];
            $order->tensp = $item['item']['name'];
            $order->image = $item['item']['image'];
            $order->price = $item['item']['price'];
            $order->qty = $item['qty'];
            $order->totalprice = $item['qty'] * $item['item']['price'];
            $order->thanhtien += $_SESSION['price'];
            $order->save();
        }
        Session::forget('cart');
        return redirect()->route('getIndex');
    }
}
