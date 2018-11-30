@extends('includes.head')
@section('title','Edit Post')
@section('content')

<br>
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="well">
            <form action="{{route('posts.update',$posts->id)}}" method="post" enctype="multipart/form-data">
                <div class="text-center"><h4>Buat Post Baru</h4></div>
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="form-group">
                    <label for="title">Title Post</label>
                    <input type="text" name="title" class="form-control" value="{{$posts->title}}" placeholder="Input Title">
                </div>
                <div class="form-group">
                    <label for="category">Kategori :</label>
                    <select name="category_id" class="form-control">
                        <option value="" class="disable selected">Pilih Kategori</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" 
                                @if($posts->category_id===$category->id)
                                selected
                                @endif
                                >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tags :</label>
                    <select name="tags[]" multiple="multiple" class="form-control selectpicker">
                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="image">Pilih Gambar</label> 
                    <input type="file" name="image" class="form-control">
                </div>
                
                <div class="form-group">
                    <img src="{{asset('images/'.$posts->image)}}" style="height: 200px; width: 100%">
                </div>

                <div class="form-group">
                    <label for="content">Content Post</label>
                    <textarea type="" name="content" class="form-control" rows="5" placeholder="Input Content">{{$posts->content}}</textarea>
                </div>
                <button class="btn btn-success" type="submit">Save</button> 
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('.selectpicker').selectpicker().val({!!json_encode($posts->tags()->allRelatedIds())!!}).trigger('change');
    
    CKEDITOR.replace('content');
</script>
@endsection