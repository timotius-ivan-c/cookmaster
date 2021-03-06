@extends('layouts.home_menu')
@section('namapage')
    class="background-4"
@endsection
@section('content-home')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(!empty($recipe))
            <div class="card">
                <div class="card-header">
                    <span class="col-md-">
                        <strong class="h3">{{ $recipe->name }}</strong><br>
                        Author: <a href="/profile/{{$recipe->user->id}}">{{ $recipe->user->name }}</a><br>
                        Average Rating: <strong class="pr-2">{{ $recipe->average_rating}}</strong><br>
                        Published: <strong>{{ substr($recipe->publish_date, 0, 10) }}</strong>
                    </span>
                    @if($is_author)
                        <button class="btn btn-primary float-right" onclick="window.location='/edit-recipe/{{$recipe->id}}'">Edit Recipe</button>
                    @endif
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!empty($delete_review_error))
                        <div class="alert alert-warning">Error deleting your review. Please refresh the page and try again.</div>
                    @endif
                    <div class="pb-4">
                        <img class="img-thumbnail" src="{{asset('storage/'.$recipe->image)}}" alt="{{$recipe->name}}">
                    </div>
                    <div class="card mb-2">
                        <div class="card-header">Ingredients</div>
                        @forelse($recipe->recipeDetailIngredient as $ingredient)
                            <div class="card-body">{{ $ingredient->amount }} {{ $ingredient->name }} @if(!empty($ingredient->notes)) ({{ $ingredient->notes }}) @endif</div>
                        @empty
                            <div class="card-body">{{ __('Nothing here. Please contact the recipe author.') }}</div>
                        @endforelse
                    </div>
                    <div class="card mt-2">
                        <div class="card-header"> {{ __('Steps') }} </div>
                        @forelse($recipe->recipeDetailStep as $step)
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-md-1">{{ $step->step_no }}.</div>
                                    @if($step->image)
                                        <img class="card-image-top" src="{{asset('storage/'.$step->image)}}" alt="{{$step->image}}">
                                        
                                    @endif    
                                    <div class="col-md-11">
                                        <br>
                                        {{ $step->text }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card-body">{{ __('Nothing here. Please contact the recipe author.') }}</div>
                        @endforelse
                    </div>
                            
                        <div class="card mt-2">
                            <div class="card-header">{{ __('Reviews') }}</div>
                            @forelse($my_review as $myrev)
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>You</strong> <span class="float-right">Date: {{ $myrev->publish_date }}</span>
                                    </div>
                                    <div class="card-body pb-0">Rating: {{ $myrev->rating }}</div>
                                    <div class="card-body">{{ $myrev->review_text }}</div>
                                    <div class="card-footer">
                                        <form class="float-right" action="/delete-review/" method="post">
                                            @csrf
                                            <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="card-body">
                                @if(Auth::check() && $is_author==false)
                                <div class="card">
                                    <div class="card-header">Write your review . . .</div>
                                    @if($errors->any())
                                        <div class="alert alert-warning">
                                            @foreach($errors->all() as $err)
                                            <div class="errors">{{ $err }}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="card-body pb-0">
                                        <div class="col">
                                            <div class="well well-sm">
                                                <div class="text-right">
                                                    <a class="btn btn-success btn-green col-md-12" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                                                </div>
                                            
                                                <div class="row" id="post-review-box" style="display:none;">
                                                    <div class="col-md-12">
                                                        <form accept-charset="UTF-8" action="/add-review/" method="post">
                                                            @csrf
                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            <input id="ratings-hidden" name="rating" type="hidden"> 
                                                            <textarea class="form-control animated" cols="50" id="new-review" name="review_text" placeholder="Enter your review here..." rows="5"></textarea>
                                            
                                                            <div class="text-right">
                                                                <div class="stars starrr" data-rating="0"></div>
                                                                <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                                                <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                                                <button class="btn btn-success btn-lg" type="submit" name="recipe_id" value="{{$recipe->id}}">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforelse
                            @forelse($recipe->review as $review)
                                @if(!empty($my_review) && $review->user_id != $my_review->first()->user_id)
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-header"><strong>{{ $review->user->name }}</strong> <span class="float-right">Date: {{ $review->publish_date }}</span></div>
                                        <div class="card-body pb-0">Rating: {{ $review->rating }}</div>
                                        <div class="card-body">{{ $review->review_text }}</div>
                                    </div>
                                </div>
                                @endif
                            @empty
                                <div class="card-body">{{ __('No reviews yet.') }}</div>
                            @endforelse
                        </div>
                </div>
            </div>
        @else
        <div class="card">
            <div class="alert alert-warning">{{ $error }}</div>
            @if(!Auth::check())
                <div class="alert alert-warning">We are sorry, this recipe is subscribers-only. Please <a href="/login">login</a> first to verify your credentials!</div>
            @else
                <div class="card-body">Click the button below to view subscription plans for this chef:</div>
                <button class="btn btn-primary" onclick="window.location='/subscribe/{{$chef_id}}'">View Plans</button>
            @endif
        </div>
        @endif
        </div>
    </div>
</div>
<style>
    .animated
    {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
    }

    .stars
    {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
    }
</style>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/4.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

@if(Auth::check())
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

    var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

    $(function(){

    $('#new-review').autosize({append: "\n"});

    var reviewBox = $('#post-review-box');
    var newReview = $('#new-review');
    var openReviewBtn = $('#open-review-box');
    var closeReviewBtn = $('#close-review-box');
    var ratingsField = $('#ratings-hidden');

    openReviewBtn.click(function(e)
    {
        reviewBox.slideDown(400, function()
        {
            $('#new-review').trigger('autosize.resize');
            newReview.focus();
        });
        openReviewBtn.fadeOut(100);
        closeReviewBtn.show();
    });

    closeReviewBtn.click(function(e)
    {
        e.preventDefault();
        reviewBox.slideUp(300, function()
        {
            newReview.focus();
            openReviewBtn.fadeIn(200);
        });
        closeReviewBtn.hide();
        
    });

    $('.starrr').on('starrr:change', function(e, value){
        ratingsField.val(value);
    });
    });
</script>
@endif
@endsection
