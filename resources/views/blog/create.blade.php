@extends('includes.head')
@section('title','Create Post')
@section('content')


<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">+Add New Post</a></li>
        <li><a data-toggle="tab" href="#menu1"><i class="fa fa-list"></i> All Post</a></li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active"><br>
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <div class="well">
                        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                            <div class="text-center"><h4>Buat Post Baru</h4></div>
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Title Post</label>
                                <input type="text" name="title" class="form-control" placeholder="Input Title">
                            </div>

                            <div class="form-group">
                                <label for="category">Kategori :</label>
                                <select name="category_id" class="form-control">
                                    <option value="" class="disable selected">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tags">Tags :</label>
                                <select name="tags[]" multiple="multiple" class="form-control selectpicker">
                                    @foreach($tags as $tag)
                                    <option value="{{$tag->id}}" >{{$tag->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Thumbnail :</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="content">Content Post</label>
                                <textarea type="" name="content" class="form-control" rows="5" placeholder="Input Content"></textarea>
                            </div>
                            <button class="btn btn-success" type="submit">Save</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <br>
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="info">
                        <th>No.</th>
                        <th>Judul Post</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Tanggal Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td><a href="{{route('posts.edit',$post->id)}}" data-toggle="modal"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#{{$post->id}}-delete" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach ($posts as $post)
            <div class="modal fade" id="{{$post->id}}-delete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                            <h4 class="modal-title">Konfirmasi Penghapusan</h4>
                        </div>
                        <div class="modal-body">
                            <p>Title :</p>
                            <h3>{{$post->title}}</h3>
                            <form action="{{route('posts.destroy',$post->id)}}" method="post" >
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" value="Hapus" class="btn btn-danger btn-block">
                            </form>
                        </div> 
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</div>

@endsection
@section('js')
<script language="javascript">
CKEDITOR.replace( 'content', {
    on: {
        instanceReady: function( ev ) {
            // Output paragraphs as <p>Text</p>.
            this.dataProcessor.writer.setRules( 'p', {
                indent: false,
                breakBeforeOpen: true,
                breakAfterOpen: false,
                breakBeforeClose: false,
                breakAfterClose: true
            });
        }
    }
});
</script>
@endsection