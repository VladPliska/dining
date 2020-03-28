<!DOCTYPE html>
<html>
<head>
    <title>Чек</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <meta charset="UTF-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    @font-face {
      font-family: myFirstFont;
      src: url('../../public/fonts/arialuni.ttf');
    }
    body{
        font-family: myFirstFont;
    }
        .box {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<br/>
<div class="container">
    <h3 align="center">{{$data['header']}}</h3><br/>
    <br/>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Weight</th>
                <th>Count</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data['content'] as $k => $v)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$v->name}}</td>
                    <td>{{$v->weight}}</td>
                    <td>1</td>
                    <td>{{$v->price}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
