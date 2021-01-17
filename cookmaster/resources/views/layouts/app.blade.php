<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cook master</title>
    <style>
        body{
            background-size: cover;
            background-repeat: repeat;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .background-1{
            background-image: url('{{asset('storage/background/bg-1.png')}}');
        }
        .background-2{
            background-image: url('{{asset('storage/background/bg-2.png')}}');
        }
        .background-3{
            background-image: url('{{asset('storage/background/bg-3.png')}}');
        }
        .background-4{
            background-image: url('{{asset('storage/background/bg-4.png')}}');
        }
        .pagination{
            margin-top: 10px;
            clear:left;
        }
        nav{
            margin-bottom: 20px;
        }
        .log-reg{
            margin: 5px;
        }
        .log-reg a{
            color: gray;
        }
        .form-inline{
            width: 31.8vw;
        }
        nav .btn-primary{
            width: 100px;
            margin: 2px;
        }
        .adm-btns{
            margin-bottom: 20px;
        }
        img{
            height: 300px;
            width: 300px;
            margin: auto;
        }
        #image_show[src=""] {
            display: none;
        }
        .img-grid{
            margin: 5px;
        }
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
            top: 290px;
        }
        .table{
           width: 800px;
           margin: auto;
           border: 1px solid black;
           opacity: 1;
       }
       .box-content{
           background-color: white;
           width: max-content;
           height: auto;
           margin: auto;
           padding-top: 50px;
           padding-left: 25px;
           padding-right: 25px;
           padding-bottom: 100px;
           opacity: 0.98;
       }
       .box-content-form{
           background-color: white;
           width: 800px;
           height: auto;
           margin: auto;
           padding-top: 50px;
           padding-left: 25px;
           padding-right: 25px;
           padding-bottom: 100px;
           opacity: 0.98;
       }
       .box-content-topup{
           background-color: white;
           width: 800px;
           height: auto;
           margin: auto;
           padding-top: 50px;
           padding-bottom: 100px;
           opacity: 0.98;
       }
       .card-topup{
           margin: auto;
           width: 1200px;
       }
      
        @media screen and (max-width: 800px) {
            .card{
                margin: auto;
            }
            .adm-btns{
                text-align: center;
                display: block;
            }
            .btn{
                margin-top: 5px;
            }
        }
        
        .card>.card:hover{
            transform: scale(1.002);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        }

    </style>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_show')
                        .attr('src', e.target.result)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function(){
            $("#myBtn").click(function(){
                var choose = $("#choose").val();
                var str = $("#search").val();
                if(str == ""){
                    alert("Search is Empty");
                } else{
                    if(choose == 'recipe'){
                        window.location = "/recipe/name/"+str;
                    } else{
                        window.location = "/recipe/ingredient/"+str;
                    }
                }
                
            })
        });
    </script>
</head>
<body @yield('namapage')>
    {{-- nav class from app.blade.php + search bar--}}
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <input class="form-control mr-sm-2 col-lg-6" type="text" placeholder="Search" id="search" name="search" aria-label="Search">
                    <select name="choose" id="choose">
                        <option value="recipe">Recipe</option>
                        <option value="ingredient">Ingredient</option>
                    </select>
                    <button class="btn btn-primary my-2 my-sm-0" type="button" id="myBtn">Search</button>
                </ul>
                <ul class="navbar-nav mr-auto">
                    <a class="navbar-brand  text-center" href="{{ url('/') }}">
                        <font size ="6px">cook master</font><br><font size="3px"><i>anyone can cook</i></font>
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile/{{Auth::user()->id}}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        {{-- show extra buttons if the user is a member --}}
                        @if(\Auth::user()->role_id == 1)
                            <button type="button" class="btn btn-primary mr-sm-2" onclick="window.location.href='/subscribe/{{Auth::user()->id}}'">Subscription</button>
                        @elseif(\Auth::user()->role_id==2||\Auth::user()->role_id==3)
                            <button type="button" class="btn btn-primary mr-sm-2" onclick="window.location.href='/earning'">Earnings</button>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
