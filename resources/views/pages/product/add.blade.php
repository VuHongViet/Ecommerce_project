@extends('layouts.master')

@section('title')
	Thêm sản phẩm
@endsection

@section('content')
	<div class="card shadow mb-4">
		<div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
	    </div>
		<div class="row" style="margin: 5px">
	        <div class="col-lg-12">
	            <form role="form" action="{{route('postAddProduct')}}" method="post" enctype="multipart/form-data">
	            	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                <fieldset class="form-group">
						<label>Category</label>
                        <select name="sltSelect" class="form-control">
							<option value="0" selected="selected">Please Choose Category</option>
							<?php cate_parent($cate);?>
						</select>
	                    <label>Tên sản phẩm</label>
                        <input class="form-control" name="txtname" placeholder="Nhập tên loại sản phẩm">
                        @if ($errors->has('name'))
                            <span class="error" style="color: red;font-size: 1rem;">{{$errors->first('name')}}</span>
                        @endif
	                </fieldset>
	                <div class="form-group">
	                	<label for="quantity">Price</label>
	                	<input type="text" name="txtprice" min="1" value="1" class="form-control">
                        @if ($errors->has('quantity'))
                            <span class="error" style="color: red;font-size: 1rem;">{{$errors->first('quantity')}}</span>
                        @endif
	                </div>
	                <div class="form-group">
	                	<label for="price">Intro</label>
	                	<textarea name="txtintro" id="" cols="20" rows="7" class="form-control"></textarea>
	                </div>
	                <div class="form-group">
	                	<label for="price">Content</label>
	                	<textarea name="txtcontent" id="" cols="20" rows="7" class="form-control"></textarea>
	                </div>
	                <div class="form-group">
	                	<label for="text">Product Image</label><br>
                        <input type="file" name="photos" multiple="multiple" class="form-control">
                        <span class="error" style="color: red;font-size: 1rem;">{{$errors->first('image')}}</span>
	                </div>
	                <div class="form-group">
	                	<label>Product Detail Image</label>
	                	<input type="file" name="Image[]" multiple="multiple"  class="form-control">
	                </div>
	                <div class="form-group">
	                    <label>Product Keyword</label>
	                    <input type="text" name="txtkeyword" class="form-control">
	                </div>
	                <div class="form-group">
	                    <label>Description</label>
	                    <textarea id="demo" name="txtdescription" id="" cols="20" rows="7" class="form-control"></textarea>
	                </div>
	                <button type="submit" class="btn btn-success">Thêm</button>
	                <button type="reset" class="btn btn-primary">Nhập Lại</button>
	            </form>
	        </div>
	    </div>
	</div>
@endsection
