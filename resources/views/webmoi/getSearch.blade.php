@extends('webmoi.master')
@section('title')
    Trang chủ
@endsection
@section('content')
<div class="container" id="slide-show">
        <div class="row">
            <div class="col-sm-9" id="slide-show-hot">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{ asset('public/template/image/banner1.jpg') }}" alt="Los Angeles" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="{{ asset('public/template/image/banner2.png') }}" alt="Chicago" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="{{ asset('public/template/image/banner3.jpg') }}" alt="New york" style="width:100%;">
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-3" id="service">
                <div class="container-fluid">
                    <div class="row">
                        <div class="service">
                            <a href="#"><img src="{{ asset('public/template/image/service1.jpg') }}" alt="Ưu đãi màu hè" width="100%"/></a>
                        </div>
                        <div class="service">
                            <a href="#">
                                <div id="service2">
                                    <i class="fa fa-gift" style="padding-right: 5%;"></i>
                                    MUA TRẢ GÓP
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end Slide show-->
<div class="container-fluid">
        <div class="container" id="product-header">
            <div>
                <i class="fa fa-list-alt" style="padding-right: 5px;"></i>
                Sản phẩm mới</span>
            </div>
        </div>
    </div><!--end Product header-->
    <div class="container-fluid" id="product-list">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9" id="product">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach($product as $item)
                                    <div class="col-sm-3 item-product">
                                        <div class="grid" class="item-img">
                                            <figure class="effect-zoe">
                                                <a href="detail.html"><img src="{{ asset('resources/upload/product/'.$item['image']) }} " alt="img25"/></a>
                                                <figcaption>
                                                    <p>
                                                        <span><a href="{{route('addCart',$item['id'])}}">Mua ngay</a></span>
                                                    </p>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="item-name">
                                            <span style="color:black;">San Pham</span> :<a href="#" style="color:red;"> {{$item['name']}}</a>
                                        </div>
                                        <div class="item-price">
                                            <span class="new-price">{{number_format($item['price'],0,',','.')}}VND</span>
                                        </div>
                                        <div class="item-price">
                                            <span class="new-price" style="color:black;">|{{$item['intro']}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3" id="right">
                        <div class="container-fluid" id="menu-right">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="menu-right-header">
                                        <i class="fa fa-tags" style="padding-right: 2%;"></i>
                                        Sản phẩm bán chạy nhất
                                    </div>
                                    <div class="menu-right-content">
                                        <a href="#">
                                            <div class="product-seller">
                                                <div class="img-seller">
                                                    <img src="{{ asset('public/template/image/sale_pic5.jpg') }}" alt="img25" />
                                                </div>
                                                <div class="name-seller">
                                                    Ao phong Levi's
                                                </div>
                                                <div class="price-seller">
                                                    <span class="new">200.000 đ</span>
                                                    <span class="old">250.000 đ</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
