<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>{{ $title }}</title>
    <style>
        .content {
            width: 90%;
            margin: 0 auto;
        }

        .dish {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
            text-align: center;
        }

        .dish div {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
<h2>{{$header}}</h2>
<div class="content">
    {!! $content !!}
</div>

</body>
</html>
