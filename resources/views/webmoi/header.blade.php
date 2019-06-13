<div class="container-fluid" id="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-3" id="logo">
                <img src="{{ asset('public/template/image/logo.png') }}" alt="logo" width="110px" height="40px">
            </div>
            <div class="col-xs-6  col-sm-6">
                <div class="container-fluid">
                    <form action="{{route('getSearch')}}" method="GET">
                        <div class="row" id="search">
                            <div class="col-sm-8" style="padding-right: 1px;">
                                <input type="search" name="key" id="txtSearch" placeholder="Nhập từ khoá tìm kiếm" style="background-color: white">
                            </div>
                            <div class="col-sm-3" style="padding: 0px;">
                            </div>
                            <div class="col-sm-1" style="padding: 0px;">
                                <button type="submit" id="btnSearch">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-3  col-sm-3" id="cart">
                <div class="cart" style="display: flex;justify-content: flex-end;">
                    <div class="header-icon-style">
                        <i class="icon-handbag icons"></i>
                        <span class="count-style">@if(Session::has('cart')){{Session('cart')->totalQty}}@else 0 @endif</span>
                    </div>
                </div>
                @if(Session::has('cart'))
                    <div class="shopping-cart-content">
                        <ul>
                            @foreach($product_cart as $product)
                                <li class="single-shopping-cart">
                                    <div class="shopping-cart-img" style="border:1px solid black;">
                                        <a href="#"><img alt="" src="{{asset('resources/upload/product/'.$product['item']['image'])}}" title="Sản phẩm 1" style="width:80px;"></a>
                                    </div>
                                    <div class="shopping-cart-title" style="border:1px solid black; width:150px;">
                                        <h4 style="text-align:left;">Name :  <a href="#">{{$product['item']['name']}}</a></h4>
                                        <div class="shopping-cart-delete">
                                            <a href="{{route('deleteCart',$product['item']['id'])}}" class="cart-item-delete"><i class="fa fa-times"></i></a>
                                        </div>
                                        <p style="text-align:left;">Quantity: {{$product['qty']}}</p>
                                        <span style="text-align:left;">Price : {{number_format($product['qty'] * $product['item']['price'],0,',','.')}} VND</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="shopping-cart-total">
                            <h4>Phí Ship : <span> 20.000VNĐ</span></h4>
                            <h4>Tổng tiền thanh toán : <span class="shop-total">{{number_format(Session('cart')->totalPrice,0,',','.')}}VNĐ</span></h4>
                        </div>
                        <div class="shopping-cart-btn">
                            <a href="{{route('getCart')}}">view cart</a>
                            @if(Auth::guard('account')->check())
                                <a href="{{route('getCart')}}">checkout</a>
                            @else
                                <a data-toggle="modal" data-target="#myModal">checkout</a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('getIndex')}}">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse" style="position: relative">
            <?php
                 $data = DB::table('category')->select('id','name')->where('parent_id',0)->get()->toArray();
            ?>
                <ul class="nav navbar-nav">
                    <?php
                        foreach($data as $key => $item){
                    ?>
                        <li class="dropdown" style="font-weight:bold;">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspoup="true" aria-expanded="false">
                                <?php echo $data[$key]->name;?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                    $values = DB::table('category')->where('parent_id',$item->id)->get()->toArray();
                                    foreach($values as $key => $value){
                                ?>
                                    <li>
                                        <a href="{{route('ChiTiet',$values[$key]->id)}}" style="font-weight:bold;"><?php echo $values[$key]->name;?></a>
                                    </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if(Auth::guard('account')->check()){
                            $user = Auth::guard('account')->user();
                    ?>
                        <li style="font-weight:bold;line-height:50px;">Xin Chào : {{$user['username']}}</li>
                        <li style="font-weight:bold"><a href="{{route('getLogout')}}"> || Logout</a></li>
                    <?php
                        }else{
                    ?>
                        <li><a data-toggle="modal" data-target="#register" style="font-weight:bold"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a data-toggle="modal" data-target="#myModal" style="font-weight:bold"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content fix_modal   ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Đăng nhập</h4>
            </div>
            <form action="{{route('postLoginAccount')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body formlogin">
                    <Label>Tên Tài Khoản</Label>
                    <input type="text" name="name" placeholder="Nhập tên tài khoản">
                    <Label>Mật Khẩu</Label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="border-radius:5px">
                       Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade register" id="register" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content fix_modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Đăng kí</h4>
            </div>
            <form action="{{route('postRegisterAccount')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body formlogin">
                    <Label>Tên Tài Khoản</Label>
                    <input type="text" name="name" placeholder="Nhập tên tài khoản">
                    <Label>Mật Khẩu</Label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="border-radius:5px">
                        Đăng kí
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".shopping-cart-btn a").on('click',function(){
            var data = "shopping-cart-content";
            $("."+data).hide();
        })
    });
</script>