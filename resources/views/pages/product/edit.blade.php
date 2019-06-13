@extends('layouts.master')

@section('title')
	Thêm sản phẩm
@endsection

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('public/js/myjavascript.js') }}"></script>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h6>
	    </div>
		<div class="row" style="margin: 5px">
	        <div class="col-lg-12">
            <form action="" method="POST" name="frmEdit" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <table class="table table-response table-hover table-bordered">
                    <tr>
                        <th>Category</th>
                        <td>
                            <select name="txtselect" id="" class="form-control">
                                <option value="0">Pleasse Choose Category</option>
                                <?php
                                    cate_parent($product,0,'--',$parent['cate_id']);
                                ?>
                            </select>
                        </td>
                    </tr>
                        <tr>
                            <th>Name</th>
                            <td><input type="text" name="txtname" class="form-control" placeholder="Vui lòng nhập vào tên sản phẩm" value="{{old('txtname',isset($parent)?$parent['name']:null)}}"></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input type="text" name="txtprice" class="form-control" placeholder="Vui lòng nhập vào giá" value="{{old('txtprice',isset($parent)?$parent['price']:null)}}"></td>
                        </tr>
                        <tr>
                            <th>Intro</th>
                            <td>
                                <textarea name="txtintro" id="" cols="20" rows="7" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td>
                                <textarea name="txtcontent" id="" cols="20" rows="7" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <td>
                                <input type="file" name="photos" multiple="multiple" class="form-control">
                                <img src="{{asset('resources/upload/product/'.$parent['image'])}}" alt="" style="width:100px;">
                            </td>
                        </tr>
                        <tr>
                            <th>Product Detail Image</th>
                            <td>
                                <input type="file" name="Image[]" multiple="multiple" class="form-control">
                                <?php
                                    $data = DB::table('product_detail')->where('product_id',$parent['id'])->get()->toArray();
                                    $value = explode(";",$data[0]->image);
                                    foreach($value as $key => $item){
                                ?>
                                    <div class="form-group" style="display:inline">
                                        <img src="{{asset('resources/upload/product_detail/'.$item)}}" idProduct="{{$parent['id']}}" idDetail="{{$key}}" idObject="{{$fuck[0]['id']}}" alt="" style="width:100px;">
                                        <a href="javascript:void(0)" class="btn btn-danger" id="del_img" id1="border_img">&times</a>
                                    </div>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Product Keyword</th>
                            <td><input type="text" name="txtkeyword" class="form-control" value="{{old('txtkeyword',isset($parent)?$parent['keywords']:null)}}"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>
                                <textarea name="txtdescription" id="" cols="20" rows="7" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="btnsubmit" class="btn btn-success form-control" value="Sửa sản phẩm"></td>
                        </tr>
                    </table>
                </form>
	        </div>
	    </div>
	</div>
@endsection