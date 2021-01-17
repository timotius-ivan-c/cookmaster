<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .page-not-found{
           background-image: url('{{asset('storage/background/404.png')}}');
           background-size: cover;
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           z-index: -1;
        }
        .err-404{
            border-radius: 0;
            padding: 15px;
            font-family: "Verdana";
            font-size: smaller;
            letter-spacing: 1px;
            position: relative;
            left: 595px;
            top: 400px;
        }
    </style>
</head>
<body>
    <div class="page-not-found"></div>
    <button type="button" class="btn btn-dark err-404" onclick="window.location.href='/home'">RETURN HOME</button>
</body>
</html>