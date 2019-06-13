<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Danh sach Account</h1>
        </div>
        <div class="row">
            <div class="sol-xs-6">
                <h3>Số Lượng Account Trong Hệ Thống: {{$count}}</h3>
            </div>
            <div class="sol-xs-6">
                <a href="{{route('getAdd')}}">Back</a>
            </div>
        </div>
        <table class="table table-response table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>UserName</th>
                <th>Level</th>
            </tr>
            @foreach($account as $key => $val)
                <tr>
                    <td>{{$account[$key]['id']}}</td>
                    <td>{{$account[$key]['username']}}</td>
                    <td>{{$account[$key]['level']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>