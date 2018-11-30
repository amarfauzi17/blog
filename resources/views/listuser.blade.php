@extends('includes.head')
@section('content')
<div class="container" style="margin-bottom: 120px">
    <div class="row">
	            <table class="table table-striped table-hover">
                <thead>
                    <tr class="info">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
						<th>Edit</th>
						<th>Delete</th>
                    </tr>
                </thead>
                <tbody>
				<?php $no=1;?>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
						<td>{{$user->level}}</td>
						<td><a href="#{{$user->id}}" data-toggle="modal"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#{{$user->id}}-delete" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
        </table> 
		@foreach ($users as $user)
            <div class="modal fade" id="{{$user->id}}-delete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                            <h4 class="modal-title">Konfirmasi Penghapusan</h4>
                        </div>
                        <div class="modal-body">
                            <p>Name :</p>
                            <h3>{{$user->name}}</h3>
                            <form action="{{route('listuser.destroy',$user->id)}}" method="post" >
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" value="Hapus" class="btn btn-danger btn-block">
                            </form>
                        </div> 
                    </div>
                </div>
            </div> 
        @endforeach
		@foreach ($users as $user)
        <div class="modal fade" id="{{$user->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Kategory</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('listuser.update',$user->id)}}" method="post" role="form">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="form-group">
                                <label for="level">Level :</label>
								<select name="level" class="form-control">
									<option value="admin" selected="<?php if($user->level == 'admin'){echo 'selected'; }?>">Admin</option>
									<option value="author" selected="<?php if($user->level == 'author'){echo 'selected'; }?>">Author</option>
									<option value="user" selected="<?php if($user->level == 'user'){echo 'selected';} ?>">User</option>
								</select>	
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