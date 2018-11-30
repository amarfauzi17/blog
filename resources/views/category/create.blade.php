@extends('includes.head')

@section('title','Create Category')
@section('content')
<div class="container">
    <div class="text-center">
        <h1>Halaman Kategori</h1>
    </div>
    <hr>

    <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            <form action="{{route('category.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Buat Kategori Baru">
                </div>
                <button type="submit" class="btn btn-success btn-block">Save</button>
            </form>
        </div>
        <br>
        <div class="text-center">
            <h4>Tabel Kategori</h4>
        </div> 
        <table class="table table-striped table-hover">
            <thead>
                <tr class="info">
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Tanggal Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $show)
                <tr>
                    <td>{{$show->id}}</td>
                    <td>{{$show->name}}</td>
                    <td><a href="#{{$show->id}}" data-toggle="modal"><i class="fa fa-edit"></i></a></td>
                    <td><a href="#{{$show->id}}-delete" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
                    <td>{{$show->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($category as $categories)
        <div class="modal fade" id="{{$categories->id}}-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                        <h4 class="modal-title">Hapus Kategory "<b>{{$categories->name}}</b>" ?</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('category.destroy',$categories->id)}}" method="post" >
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="submit" value="Hapus" class="btn btn-danger btn-block">
                        </form>
                    </div> 
                </div>
            </div>
        </div> 
        @endforeach
        @foreach ($category as $categories)
        <div class="modal fade" id="{{$categories->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Kategory</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('category.update',$categories->id)}}" method="post" role="form">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{$categories->name}}">
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