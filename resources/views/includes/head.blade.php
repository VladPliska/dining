<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Baloo+2|Montserrat&display=swap" rel="stylesheet">
    <script src="js/app.js"></script>
    <script src="https://kit.fontawesome.com/71de464d86.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href='css/app.css'>
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


