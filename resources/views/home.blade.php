@extends('includes.head')

@section('content')
<div class="container">
@if(\Session::has('error'))
<div class="alert alert-danger">
{{\Session::get('error')}}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged as {{auth()->user()->level}}!
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="well well-sm wl">

                        <div class="btn-group">
                            <a href="#" id="list" class="btn btn-default btn-sm"><span class="fa fa-th-list">
                                </span> List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                                    class="fa fa-th"></span> Grid</a>
                        </div>
                    </div>

                    <div id="grid_post" class="row list-group">
                        @foreach($posts as $post)
                        <div class="item  col-xs-4 col-lg-4">
                            <div class="thumbnail as">
                                <img class="group list-group-image" src="{{asset('images/'.$post->image)}}" alt="" />
                                <div class="caption">
                                    <div class="c_hr">
                                        <h4 class="group inner list-group-item-heading"><a href="posts/{{$post->slug}}">{{str_limit($post->title,50)}}</a></h4>
                                        <small>{{date('j F Y',strtotime($post->created_at))}}</small> | by <a href="#">Admin</a>

                                    </div>
                                    <p class="group inner list-group-item-text">{{str_limit($post->content,150)}}</p>
                                    <div class="row"></div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div><!-- end grid -->
                </div>
                @include('includes.sidebar')
            </div><!-- end row -->
        </div>
    </section>
    <!-- FOOTER --> 
    <div class="text-center">
        <ul class="pagination">
			{{ $posts->links() }}
        </ul>
    </div>
    <!-- END FOOTER --> 
</div><!-- end con fluid -->

@endsection
