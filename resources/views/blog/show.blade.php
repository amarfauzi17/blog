@extends('includes.head')

@section('title',$posts->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="post-item">
                <div class="post-inner">
                    <div class="post-head clearfix">
                        <div class="col-md-12">
                            <div class="detail">
                                <h2 class="handle">{{$posts->title}}</h2>
                                <div class="post-meta">
                                    <div class="asker-meta">
                                        <span>{{date('j F Y',strtotime($posts->created_at))}}</span>
                                        <span>By : </span>
                                        <span><a href="#">Admin</a></span>
                                    </div>
                                    <div class="share">
                                        <label>Share : </label>
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa-twitter"></i>
                                        <i class="fa fa-reddit"></i>
                                    </div>
                                    <div class="tags">
                                        @foreach($posts->tags as $tag)
                                        <span class="label label-success"># {{$tag->name}}</span>
                                        @endforeach
                                    </div>
                                    <div class="kategori">
                                        <span class="label label-default pull-right">{{$posts->category->name}}</span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="avatar_show">
                                <a href=""><img src="{{asset('images/'.$posts->image)}}"></a>
                            </div>
                            <br>
                            <div class="post-content">
                                <p>{{$posts->content}}</p>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- Comment Form -->
            <hr>
            <h4>Comment</h4>
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading" style="border-bottom: none">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">All Comment</a></li> 
                        <li><a href="#tab2" data-toggle="tab">Add Comment</a></li>
                        <li><a href="#tab3" data-toggle="tab">Disqus</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                            @if($posts->comment->isEmpty())
                            <div class="text-center">
                                No Comment
                            </div>
                            @else
                            @foreach($posts->comment as $comment)
                            <div class="post-item">
                                <div class="post-inner">
                                    <div class="post-head clearfix">
                                        <div class="col-md-2">
                                            <img src="https://a.disquscdn.com/1504815928/images/noavatar92.png" style="border-radius:120px;">
                                        </div> 
                                        <div class="col-md-10">
                                            <h4>{{$comment->comment}}</h4>
                                            <hr>
                                            <p>by <a href="">{{$comment->user->name}}</a></p>
                                            <div class="pull-right">
                                                <small>{{$comment->created_at->diffForHumans()}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>


                        <div class="tab-pane fade" id="tab2">
                            <form action="{{route('buatkomentar.store',$posts->id)}}" method="post">
                                {{csrf_field()}}
                                <label>Tulis Komentar </label>
                                <div class="form-group">
                                    <textarea type="text" name="comment" class="form-control" placeholder="Tulis KOmentar"></textarea>
                                </div>
                                <button class="btn btn-success" type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="tab3">
                            disqus
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.sidebar')
    </div>
</div>
@endsection