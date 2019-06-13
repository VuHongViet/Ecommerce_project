<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="{{ url('public/js/cate/myjavascript.js') }}"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Category List</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                @if(Session::has('message'))
                    <div class="alert alert-{!!Session::get('level')!!}">
                        {!!Session::get('message')!!}
                    </div>
                @endif
            </div>
        </div>
        <table class="table table-hover table-reponse table-bordered">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Category Parent</td>
                <td>Delete</td>
                <td>Edit</td>
            </tr>
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
                    <td class="center">
                        <i class="fa fa-trash-o fa-fw"></i>
                        <a href="{{route('getDelete',$item->id)}}">Delete</a>
                    </td>
                    <td class="center">
                        <i class="fa fa-pencil fa-fw"></i>
                        <a href="{{route('getEdit',$item->id)}}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>