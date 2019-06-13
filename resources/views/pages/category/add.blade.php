@extends('layouts.master')

@section('title')
	Thêm danh mục sản phẩm
@endsection

@section('content')
	<div class="card shadow mb-4">
		<div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
	    </div>
		<div class="row" style="margin: 5px">
	        <div class="col-lg-12">
	            <form role="form" action="{{route('postAdd')}}" method="post">
	            	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                <fieldset class="form-group">
						<label>Category Parent</label>
						<select name="txtselect" class="form-control">
							<option value="0" selected="selected">Please Choose Category Parent</option>
							<?php cate_parent($cate);?>
						</select>
                        <label>Name</label>
                        <input class="form-control" name="txtname" placeholder="Nhập tên category">
						<span class="error">{{$errors->first('txtname')}}</span><br/>
                        <label>Order</label>
						<input class="form-control" name="txtorder" placeholder="Nhập tên Order" require>
						<span class="error">{{$errors->first('txtorder')}}</span><br/>
						<label>Keywords</label>
						<input class="form-control" name="txtkeywords" placeholder="Nhập Keyword" require>
						<span class="error">{{$errors->first('txtkeywords')}}</span><br/>
						<label>Description</label>
						<textarea name="txtdescription" id="demo" cols="20" rows="7" class="form-control"></textarea>
	                </fieldset>
	                <button type="submit" class="btn btn-success">Submit Button</button>
	                <button type="reset" class="btn btn-primary">Reset Button</button>
	            </form>
	        </div>
	    </div>
	</div>
@endsection
