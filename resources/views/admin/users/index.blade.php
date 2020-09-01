@extends('template.home')

@section('title' , 'User')

@section('sub_title' , 'User')
 
@section('content')

@if(Session::has('message'))
  <div class="alert alert-success" role="alert">
    {{ Session('message') }}
  </div>
@endif

	<!-- TABLE -->
	<div class="row">
  		<div class="col-lg">

		   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Tag</h6>
            </div>
            <div class="card-body">
            	<a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus fa-sm fa-fw"></i> User</a>
              <div class="table-responsive table-hover">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">Nama User</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($user as $us)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $us->name }}</td>
      <td>{{ $us->email }}</td>
      <td>
        @if($us->status)
          <span class="badge badge-danger">Administrator</span>
          @else
          <span class="badge badge-success">Author</span>
        @endif
      </td>
      <td>
        
          <a href="{{ route('user.edit' , $us->id) }}" class="btn btn-primary btn-sm">Edit</a>
          <button type="submit" class="btn btn-danger btn-sm btn-flat btn-sm remove-user" data-id="{{ $us->id }}" data-action="{{ route('user.destroy',$us->id) }}">Hapus</button>
      </td>
    </tr>
	@endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
	<!-- END TABLE -->


@endsection