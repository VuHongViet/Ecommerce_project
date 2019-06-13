<?php

namespace App\Providers;
use Session;
use App\Cart;
use App\Order;
use App\Products;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['webmoi.header','webmoi.cart','webmoi.getOrder'],function($view){
            if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart=new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
        view()->composer(['webmoi.index','webmoi.product','webmoi.detail'],function($view){
            $data = Order::select('tensp','image','qty','price')->get()->groupby('tensp')->toArray();
            $arr = [];
            $max = 0;
            foreach($data as $item){
                $max_ao = 0;
                foreach($item as $value){
                    $max_ao += $value['qty'];
                }
                if($max_ao > $max){
                    $arr[] = $item;
                }
            }
            for($i=0;$i<count($arr);$i++){
                for($j=$i+1;$j<count($arr);$j++){
                    if(count($arr[$i]) < count($arr[$j])){
                        $attemp = $arr[$j];
                        $arr[$j] = $arr[$i];
                        $arr[$i] = $attemp;
                    }
                }
            }
            $sp_banchay = [];
            $product = [];
            for($i=0;$i<3;$i++){
                $sp_banchay[] = $arr[$i];
                $product[$i] = Products::select('id')->where('name','like','%'.$arr[$i][0]['tensp'])->get()->toArray();
            }
            $view->with(['sp_banchay'=>$sp_banchay,'product_id'=>$product]);
        });
    }
}
