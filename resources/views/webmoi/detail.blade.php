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
</div>
<div class="container-fluid">
    <div class="container" id="product-header">
        <div>
            <i class="fa fa-list-alt" style="padding-right: 5px;"></i>
            Chi Tiết Sản Phẩm</span>
        </div>
    </div>
</div>
<div class="container-fluid" id="product-list" style="position: relative; ">
    <div class="container">
        <div class="row">
            <div class="col-sm-9" id="product">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3 item-product">
                            <div class="grid" class="item-img">
                                <figure class="effect-zoe">
                                    <img src="{{ asset('resources/upload/product/'.$data[0]['image'])}} " alt="img25"/>
                                    <figcaption>
                                        <p>
                                            <span><a href="{{route('addCart',$data[0]['id'])}}">Mua ngay</a></span>
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="item-name">
                                <span style="color:black;"></span> <a href="#" style="color:red;"> {{$data[0]['name']}}</a>
                            </div>
                            <div class="item-price">
                                <span class="new-price">{{number_format($data[0]['price'],0,',','.')}}VND</span>
                            </div>
                            <div class="item-price">
                                <span class="new-price" style="color:black;">|{{$data[0]['intro']}}</span>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="page-header">
                                <h1 style="color:red">Mô tả sản phẩm</h1>
                            </div>
                            <h2 >Tên Sản Phẩm : {{$data[0]['name']}}</h2>
                            <h2>Price : <span style="color:red">{{number_format($data[0]['price'],0,',','.')}} VND</span></h2>
                            <h2>{{$data[0]['intro']}}</h2>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-6">
                            <?php
                                $data = explode(";",$image_detail[0]['image']);
                                foreach($data as $key => $item){
                            ?>
                                <div class="col-sm-3">
                                    <div class="grid" class="item-img">
                                        <figure class="effect-zoe">
                                            <img src="{{ asset('resources/upload/product_detail/'.$data[$key])}} " alt="img25" style="width:100px; height:100px"/>
                                        </figure>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="col-xs-6"></div>
                    </div>
                </div>
            <div style="margin-top:70px;">
                <div class="row">
                    <div>
                        <i class="fa fa-list-alt" style="padding-right: 5px;"></i>
                        Sản phẩm cùng loại</span>
                    </div>
                </div>
                <div class="row">
                    @foreach($sp_cungloai as $value)
                        <div class="col-sm-3 item-product">
                            <div class="grid" class="item-img">
                                <figure class="effect-zoe">
                                    <img src="{{ asset('resources/upload/product/'.$value['image'])}} " alt="img25"/>
                                    <figcaption>
                                        <p>
                                            <span><a href="{{route('addCart',$value['id'])}}">Mua ngay</a></span>
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="item-name" style="text-align:center;">
                                <span style="color:black;"></span><a href="" style="color:black;text-transform: capitalize;"> {{$value['name']}}</a>
                            </div>
                            <div class="item-price">
                                <span class="new-price" style="color:#e4101c" >{{number_format($value['price'],0,',','.')}}VND</span>
                            </div>
                            <div class="item-price">
                                <span class="new-price" style="color:black;float:right;">{{$value['intro']}}</span>
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
                            @foreach($sp_banchay as $item)
                                <div class="menu-right-content">
                                    <div class="product-seller">
                                        <div class="img-seller">
                                            <img src="{{ asset('resources/upload/product/'.$item[0]['image']) }}" alt="img25" />
                                        </div>
                                        <div class="name-seller" style="color:black;font-weight:bold;">
                                            {{$item[0]['tensp']}}
                                        </div>
                                        <div class="price-seller">
                                            <span class="new">{{number_format($item[0]['price'],0,',','.')}}VND</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
        </div>
    </div>
</div>
@endsection