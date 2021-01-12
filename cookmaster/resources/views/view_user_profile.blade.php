@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <div class="alert alert-warning">{{ __('You are viewing profile page!') }}</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($user as $usr)
                    <div class="card">
                        <divc class="card-body row">
                            <div class="col-md-8">
                                <div>Name: {{ $usr->name }}</div>
                                <div>Free recipes: {{ $usr->free_recipes_count }}</div>
                                <div>Recipes:</div>
                            </div>
                            @if(Auth::user() && Auth::user()->id != $usr->id)
                            <div class="col-md-4 float-right p-2">
                                <div class="float-right">
                                    @if($usr->role->first()->name != "Member")
                                    <button type="button" class="btn btn-primary btn-sm" onclick="window.location='{{ route('subscribe', $usr->id) }}';">Buy Subscription</button>
                                    @endif
                                    <input type="hidden" class = "user_id" name="user_id" value="{{$usr->id}}">
                                    @if(count($following)==0)
                                    <button type="button" class="btn btn-success btn-sm searchButton" id="follow" >Follow</button>
                                    @else
                                    <button type="button" class="btn btn-danger btn-sm searchButton" id="follow" >Unfollow</button>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="card">
                            @forelse($usr->recipe as $recipe)
                                <div class="card-body">{{ $recipe->name }}</div>
                            @empty
                                <div class="card-body">{{ __('No recipe shared yet.') }}</div>
                            @endforelse
                            <div>Subscriptions:</div>
                            <div class="card">
                                @forelse($usr->subscription as $sub)
                                    <div class="card-body">{{ $sub->start }}</div>
                                @empty
                                    <div class="card-body">{{ __('No subscriptions yet.') }}</div>
                                @endforelse
                            </div>
                            <div>People followed by {{ $usr->name }}:</div>
                            <div class="card">
                                @forelse($usr->following as $fol)
                                    <div class="card-body">{{ $fol->name }}</div>
                                @empty
                                    <div class="card-body">{{ __('No followings yet.') }}</div>
                                @endforelse
                            </div>
                            <div>People following {{ $usr->name }}:</div>
                            <div class="card">
                                @forelse($usr->followers as $fol)
                                    <div class="card-body">{{ $fol->name }}</div>
                                @empty
                                    <div class="card-body">{{ __('No followers yet.') }}</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@if(Auth::user())
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#follow").click(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/follow',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(".user_id").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        if ($("#follow").text() == 'Follow') {
                            $("#follow").html('Unfollow');
                            $("#follow").addClass("btn-danger").removeClass("btn-success");
                            $("#follow_msg").html("Followed!");
                        } else {
                            $("#follow").html('Follow');
                            $("#follow").addClass("btn-success").removeClass("btn-danger");
                            $("#follow_msg").html("Unfollowed!");
                        }
                    }
                }); 
            });
       });
</script>
@endif
@endsection
