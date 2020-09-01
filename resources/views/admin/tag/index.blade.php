@extends('template.home')

@section('title' , 'Tag')

@section('sub_title' , 'Tag')
 
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
            	<a href="{{ route('tag.create') }}" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus fa-sm fa-fw"></i>Tag</a>
              <div class="table-responsive table-hover">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">Name</th>
      <th scope="col">Slug</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($tag as $tg)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $tg->name }}</td>
      <td>{{ $tg->slug }}</td>
      <td>
        
          <a href="{{ route('tag.edit' , $tg->id) }}" class="btn btn-primary">Edit</a>
         <button type="submit" class="btn btn-danger btn-sm btn-flat btn-sm remove-user" data-id="{{ $tg->id }}" data-action="{{ route('tag.destroy',$tg->id) }}">Hapus</button>
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