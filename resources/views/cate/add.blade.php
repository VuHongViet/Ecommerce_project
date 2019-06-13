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
            <h1>Category Add</h1>
        </div>
        <form action="{{route('postAdd')}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <table class="table table-hover table-bordered table-response">
                <tr>
                    <td>Category Parent</td>
                    <td>
                        <select name="txtselect" id="" class="form-control">
                            <option value="0" selected>Please Choose Category</option>
                            <?php cate_parent($cate);?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Category Name</td>
                    <td>
                        <input type="text" name="txtname" class="form-control" require="">
                        {{$errors->first('txtname')}}
                    </td>
                </tr>
                <tr>
                    <td>Category Order</td>
                    <td>
                        <input type="text" name="txtorder" class="form-control" require="">
                        {{$errors->first('txtorder')}}
                    </td>
                </tr>
                <tr>
                    <td>Category Keywords</td>
                    <td>
                        <input type="text" name="txtkeywords" class="form-control" require="" require="">
                        {{$errors->first('txtkeywords')}}
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="txtdescription" id="" cols="20" rows="7" class="form-control" require=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnsubmit" class="btn btn-success form-control" value="Create"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>