@extends('layouts.master')

@section('title')
	Danh sách danh mục sản phẩm
@endsection

@section('content')
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
	    </div>
	    <div class="card-body">
	        <div class="table-responsive">
	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                <thead>
	                    <tr>
	                        <th>STT</th>
	                        <th>Name</th>
	                        <th>Category Parent</th>
	                        <th>Chỉnh sửa</th>
	                    </tr>
	                </thead>
	                <tfoot>
	                    <tr>
	                        <th>STT</th>
	                        <th>Name</th>
	                        <th>Category Parent</th>
	                        <th>Chỉnh sửa</th>
	                    </tr>
	                </tfoot>
	                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                @if($item->parent_id == 0)
                                    {{"None"}}
                                @else
                                    <?php
                                        $data = DB::table('category')->where('id',$item['parent_id'])->first();
                                        echo $data->name;
                                    ?>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('getEdit',$item->id)}}" style="color:white;">
                                    <button class="btn btn-primary editProduct">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <a href="{{route('getDelete',$item->id)}}" style="color:white;">
                                    <button class="btn btn-danger deleteProduct">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
@endsection
