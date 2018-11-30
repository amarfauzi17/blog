@extends('includes.head')

@section('title','Create New Tag')
@section('content')
<div class="container">
    <div class="text-center">
        <h1>Halaman Tags</h1>
    </div>
    <hr>

    <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            <form action="{{route('tags.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Buat Tag Baru">
                </div>
                <button type="submit" class="btn btn-success btn-block">Save</button>
            </form>
        </div>
        <br>
        <div class="text-center">
            <h4>Tabel Tag</h4>
        </div> 
        <table class="table table-striped table-hover">
            <thead>
                <tr class="info">
                    <th>No.</th>
                    <th>Nama Tag</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Tanggal Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td><a href="#{{$tag->id}}" data-toggle="modal"><i class="fa fa-edit"></i></a></td>
                    <td><a href="#{{$tag->id}}-delete" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
                    <td>{{$tag->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($tags as $tag)
        <div class="modal fade" id="{{$tag->id}}-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                        <h4 class="modal-title">Hapus Tag "<b>{{$tag->name}}</b>" ?</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('tags.destroy',$tag->id)}}" method="post" >
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="submit" value="Hapus" class="btn btn-danger btn-block">
                        </form>
                    </div> 
                </div>
            </div>
        </div> 
        @endforeach
        @foreach ($tags as $tag1)
        <div class="modal fade" id="{{$tag1->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Tag</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('tags.update',$tag1->id)}}" method="post" role="form">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{$tag1->name}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div> 
                </div>
            </div>
        </div> 
        @endforeach
    </div>
</div>


@endsection