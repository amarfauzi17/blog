@extends('includes.head')
@section('title','Hasil Pencarian')

@section('content')
@if(count($posts)>0)
<div class="container">
    <div class="text-center">
        <h1>Hasil Pencarian</h1>
    </div>
    <hr>
    @foreach($posts->all() as $post)

    <div class="post-item">
        <div class="post-inner">
            <div class="post-head clearfix">
                <div class="col-md-4">
                    <a href=""><img src="{{asset('images/'.$post->image)}}" style="height: auto;width: 100%"></a>
                </div>
                <div class="col-md-8">
                    <div class="detail">
                        <h3 class="handle"><a href="{{route('posts.show',$post->slug)}}">{{$post->title}}</a></h3>
                    </div>
                    <div class="post-meta">
                        <div>
                            <span>{{date('j F Y',strtotime($post->created_at))}}</span>
                            <span>by</span>
                            <span>Admin</span>
                        </div>                            
                    </div>
                    <span class="share">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-reddit"></i>
                        <i class="fa fa-youtube"></i>
                    </span>
                    @foreach($post->tags as $tag)
                    <span class="label label-success">{{$tag->name}}</span>
                    @endforeach

                    <div class="content"style="margin-top: 12px">
                        {!!str_limit($post->content,250)!!}
                    </div>
                </div>
            </div>
        </div>
    </div>                
    @endforeach

</div>
@else
<div class="container">
    <div class="text-center">
        <h1>Hasil Pencarian</h1>
    </div>
    <hr>
    <div class="post-item">
        <div class="post-inner">
            <div class="text-center">
                <b>No Result</b>
            </div>
        </div>
    </div>
</div>
@endif
@endsection