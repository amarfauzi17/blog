@extends('includes.head')
@section('title','Categories Index')
@section('content')

<div class="container" style="margin-bottom: 30px">
    <div class="text-center">
        <h4><a href="">All Category <small>( {{$categories->total()}} )</small></a></h4>
    </div>
    <hr>
    @foreach($categories as $category)
    <h4><a href="{{route('category.show',$category->id)}}">{{$category->name}}</a></h4>
    <div style="border-bottom: 1px solid #098;margin-bottom: 11px">
        <p>{{$category->posts()->count()}} <i class="fa fa-list-alt"></i> Post</p>
    </div>
    <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{$category->created_at->diffForHumans()}}</small></p>
    @endforeach
    <div class="text-center">
        {!!$categories->links();!!}
    </div>
</div>

@endsection