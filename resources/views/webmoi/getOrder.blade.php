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
        <h3 class="page-title" style="font-weight:bold;">Đơn Hàng Của Bạn</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{route('postOrder')}}">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th style="font-weight:bold;">Hình Ảnh</th>
                                    <th style="font-weight:bold;">Tên Sản Phẩm</th>
                                    <th style="font-weight:bold;">Tên Khách Hàng</th>
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
                                    <td >
                                        <a href="#"><img src="{{asset('resources/upload/product/'.$product['item']['image'])}}" alt="" title="Sản phẩm 1" style="width:80px;"></a>
                                    </td>
                                    <td class="product-name"><a href="#" style="font-weight:bold;">{{$product['item']['name']}}</a></td>
                                    <td style="font-weight:bold;">{{$account['username']}}</td>
                                    <td class="product-price-cart"><span class="amount" style="font-weight:bold;">{{number_format($product['item']['price'],0,',','.')}} VND</span></td>
                                    <td class="product-quantity">
                                        <div class="button">
                                            <button class="sub">-</button>
                                            <input class="input_297o" type="text" value="{{$product['qty']}}" readonly>
                                            <button class="add">+</button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal" style="font-weight:bold;">
                                        <?php
                                            $_SESSION['price'] = $product['qty'] * $product['item']['price'];
                                            echo number_format($product['qty'] * $product['item']['price'],0,',','.').'VND';
                                        ?>
                                    </td>
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
                                    <td>
                                        <input type="submit" name="btnsubmit" class="btn btn-success form-control" value="Chốt Đơn Hàng" style="text-align:center;">
                                    </td>
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
            let quantity = $('.input_297o').val();
            if(quantity==1){
                $('.sub').prop({disabled:true});
                $('.sub').css({"opacity":"0.2"});
            }
            else{
                $('.sub').prop({disabled:false});
                $('.sub').css({"opacity":"0.7"});
            }
            $('.add').click(function(e){
                e.preventDefault();
                let quantity = $('.input_297o').val();
                quantity ++;
                $('.input_297o').val(quantity);
                 quantity = $('.input_297o').val();
                if(quantity==1){
                    $('.sub').prop({disabled:true});
                    $('.sub').css({"opacity":"0.2"});
                }
                else{
                    $('.sub').prop({disabled:false});
                    $('.sub').css({"opacity":"0.7"});
                }
            })
            $('.sub').click(function(e){
                e.preventDefault();
                let sub = $('.input_297o').val();
                sub --;
                $('.input_297o').val(sub);
                sub = $('.input_297o').val();
                if(sub==1){
                    $('.sub').prop({disabled:true});
                    $('.sub').css({"opacity":"0.2"});
                }
                else{
                    $('.sub').prop({disabled:false});
                    $('.sub').css({"opacity":"0.7"});
                }
            })
        });
    </script>
@endsection