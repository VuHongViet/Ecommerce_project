@extends('layouts.master')

@section('title')
	Danh sách loại sản phẩm
@endsection

@section('content')
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Loại Sản Phẩm</h6>
	    </div>
	    <div class="card-body">
	        <div class="table-responsive">
	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                <thead>
	                    <tr>
	                        <th>STT</th>
	                        <th>Name</th>
	                        <th>Price</th>
	                        <th>Category</th>
                            <th>Create_At</th>
							<th>Delete</th>
							<th>Edit</th>
	                    </tr>
	                </thead>
	                <tfoot>
	                    <tr>
                            <th>STT</th>
	                        <th>Name</th>
	                        <th>Price</th>
	                        <th>Category</th>
                            <th>Create_At</th>
							<th>Delete</th>
							<th>Edit</th>
	                    </tr>
	                </tfoot>
	                <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{number_format($item->price,0,',','.')}}VND</td>
                                <td>
                                    <?php 
                                        $data = DB::table('category')->where('id',$item->cate_id)->first();
                                        echo $data->name;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans();
                                    ?>
                                </td>
								<td class="center">
									<i class="fa fa-trash-o fa-fw"></i>
									<a href="{{route('getDeleteProduct',$item->id)}}">Delete</a>
								</td>
								<td class="center">
									<i class="fa fa-pencil fa-fw"></i>
									<a href="{{route('getEditProduct',$item->id)}}">Edit</a>
								</td>
                            </tr>
                        @endforeach
	                </tbody>
	            </table>
	            <div class="pull-right"></div>
	        </div>
	    </div>
	</div>
@endsection
