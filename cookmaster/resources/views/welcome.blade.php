
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
    <title>CookMaster</title>
    <style>
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
            height: 200px;
            width: 200px;
            margin: auto;
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
    </style>
</head>
<body>
    {{-- nav class from app.blade.php + search bar--}}
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-1">
                    <form class="form-inline col-lg-8" action="/product/search" method="GET">
                        <input class="form-control mr-sm-2 col-lg-6" type="text" placeholder="Search" id="search" name="search" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
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
                                <a class="dropdown-item" href="">Profile</a>
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
                            <button type="button" class="btn btn-primary mr-sm-2" onclick="window.location.href='/subscriptions'">Subscription</button>
                        @elseif(\Auth::user()->role_id==2||\Auth::user()->role_id==3)
                            <button type="button" class="btn btn-primary mr-sm-2" onclick="window.location.href='/'">Earnings</button>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <ul class="nav justify-content-center" style="background-color: #e3f2fd;">
            <li class="nav-item">
                <a class="nav-link" href="">FEATURED</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/guest-chef">GUEST CHEF</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">COMMUNITY</a>
            </li>
        </div>
        @guest
        @else   
            {{--Additional button for contributor and chefs --}}
            @if(\Auth::user()->role_id==2||\Auth::user()->role_id==3)
            <br>
            <div class="container adm-btns">
                <button type="button" class="btn btn-primary" onclick="window.location.href=">Add New Recipe</button>
            </div>
            <br>
            <div class="container">
            <div class="row">
                <div class="card col-md-3 bg-light ml-5" {{--onclick="window.location.href = ''//Earnings page--}} ;" style="width: 40rem;">
                    <div class="card-body"><h5><strong>Report:</strong></h5><br>
                        <p class="card-text">
                            Balance : <br>Rp {{$user->balance}}<br>
                            <br>
                            Earnings : <br>Rp {{$earnings}}<br>
                            <br>
                            Subscribers :<br> {{$total_subscriber}}<br>
                            
                        </p>
                    </div>
                </div>
                <div class="card col-md-3 bg-light ml-5" {{--onclick="window.location.href = ''//Latest recipe page--}} style="width: 40rem;">
                    <div class="card-body"><h5><strong>Latest Recipe:</strong></h5></div>
                    <img class="card-image-top" src="{{asset('asset/'.$my_recipes->first()->image)}}"> 
                    <div class="card-body">   
                    <div class="card-title"><strong>{{$my_recipes->first()->name}}</strong></div>
                    <div class="card-text">        
                        Average rating  : <br>
                            {{$my_recipes->first()->average_rating}} / 5.00 <br> from {{$my_recipes->first()->review_count}} people <br><br>
                        <div class="container adm-btns">
                            <button type="button" class="btn btn-primary" onclick="window.location.href=">Edit Recipe</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            @elseif(\Auth::user()->role_id==1)
            
            @endif
        @endguest
        <br>
        <br>
        <div class="container">
            <h5>Best Recipes: </h5>
            <br>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-200" src="{{asset('asset/'.$best_recipes[0]->image)}}" alt="{{$best_recipes[0]->name}}">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-200" src="{{asset('asset/'.$best_recipes[1]->image)}}" alt="{{$best_recipes[1]->name}}">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-200" src="{{asset('asset/'.$best_recipes[2]->image)}}" alt="{{$best_recipes[2]->name}}">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>        
    </div>
</body>
</html>
