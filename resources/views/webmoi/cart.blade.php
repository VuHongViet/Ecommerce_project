@extends('webmoi.master')
@section('title')
Trang giỏ hàng
@endsection
@section('content')
<style>
    .product-quantity .button{
        display: flex;
        justify-content: space-between;
    }
    .button button{
        height: 41px;
        padding: 0;
        margin: 0;
        width: 30px;
        line-height: 41px;
        cursor: pointer;
        background-color: gray;
        color: black;
        opacity: 0.7;
    }
    .button:hover button{
        background-color: gray;
    }
    .button .input_297o{
        padding: 0;
        text-align: center;
    }
</style>
<div class="cart-main-area pt-95 pb-100">
    <div class="container">
        <h3 class="page-title" style="font-weight:bold;">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th style="font-weight:bold;">Hình Ảnh</th>
                                    <th style="font-weight:bold;">Tên Sản Phẩm</th>
                                    <th style="font-weight:bold;">Giá</th>
                                    <th style="font-weight:bold;">Số Lượng</th>
                                    <th style="font-weight:bold;">Tổng Tiền</th>
                                    <th style="font-weight:bold;">Thay Đổi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(Session::has('cart'))
                                @foreach($product_cart as $product)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="{{asset('resources/upload/product/'.$product['item']['image'])}}" alt="" title="Sản phẩm 1" style="width:80px;"></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{$product['item']['name']}}</a></td>
                                    <td class="product-price-cart"><span class="amount" style="font-weight:bold;">{{number_format($product['item']['price'],0,',','.')}} VND</span></td>
                                    <td class="product-quantity">
                                        <div class="button">
                                            <button class="sub">-</button>
                                            <input class="input_297o" type="text" value="{{$product['qty']}}" readonly>
                                            <button class="add">+</button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">{{number_format($product['qty'] * $product['item']['price'],0,',','.')}} VND</td>
                                    <td class="product-remove">
                                        <a href="#" title="Sửa"><i class="fa fa-pencil"></i></a>
                                        <a href="#" title="Xóa"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                                <tr>
                                    <td colspan="5" style="text-align:right;font-weight:bold">Tổng Tiền : </td>
                                    <td><span style="color:red;font-weight:bold;">{{number_format(Session('cart')->totalPrice,0,',','.')}} VNĐ</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('table > tbody > tr').each(function(){
            let quantity = $(this).find('.input_297o').val();
            if(quantity==1){
                $(this).find('.sub').prop({disabled:true});
                $(this).find('.sub').css({"opacity":"0.2"});
            }
            else{
                $(this).find('.sub').prop({disabled:false});
                $(this).find('.sub').css({"opacity":"0.7"});
            }
        });
        $('.add').click(function(e){
            e.preventDefault();
            let quantity = $(this).prev('.input_297o').val();
            quantity ++;
            $(this).prev('.input_297o').val(quantity);
                quantity = $(this).prev('.input_297o').val();
            if(quantity==1){
                $(this).parent().find('.sub').prop({disabled:true});
                $(this).parent().find('.sub').css({"opacity":"0.2"});
            }
            else{
                $(this).parent().find('.sub').prop({disabled:false});
                $(this).parent().find('.sub').css({"opacity":"0.7"});
            }
        })
        $('.sub').click(function(e){
            e.preventDefault();
            let sub = $(this).next('.input_297o').val();
            sub --;
            $(this).next('.input_297o').val(sub);
            sub = $(this).next('.input_297o').val();
            if(sub==1){
                $(this).parent().find('.sub').prop({disabled:true});
                $(this).parent().find('.sub').css({"opacity":"0.2"});
            }
            else{
                $(this).parent().find('.sub').prop({disabled:false});
                $(this).parent().find('.sub').css({"opacity":"0.7"});
            }
        })
    });
</script>
@endsection

