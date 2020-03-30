<?php
    $count = $data['count'];
?>
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
     body { font-family: DejaVu Sans, sans-serif; }

        .box {
            width: 600px;
            margin: 0 auto;
        }
        .title{
            font-size:26px;
            font-weight:600;
        }
    </style>
</head>
<body>
       <div align="center" style="font-size:26px;">Чек № {{$data['num']}}.Термін дії {{$data['date']}}</div><br/>
<br/>
<div class="container">
    <br/>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>№</th>
                <th>Назва</th>
                <th>Вага</th>
                <th>Кількість</th>
                <th>Ціна х1</th>
                <th>Загальна ціна</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data['content'] as $k => $v)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$v->getDish->name}}</td>
                    <td>{{$v->getDish->weight}}</td>
                    <td>{{$count[$k]}}</td>
                    <td>{{$v->getDish->price}}</td>
                    <td>{{$count[$k] * $v->getDish->price}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
        <span style="width:50%;text-align:left;font-size:25px;">Всього:</span>
        <span style="width:50%;float:right;text-align:right;font-weight:600;font-size:25px;margin-top:10px;margin-right:20px">{{$data['price']}}</span>
</div>
</body>
</html>
