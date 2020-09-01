@extends('template.home')

@section('title' , 'Post yang sudah dihapus')

@section('sub_title' , 'Post yang sudah dihapus')
 
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
              <h6 class="m-0 font-weight-bold text-danger">Table Trashed Post</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive table-hover">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">Judul</th>
      <th scope="col">Category</th>
      <th scope="col">Tag</th>
      <th scope="col">Thumbnail</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($post as $ps)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $ps->judul }}</td>
      <td>{{ $ps->category->name }}</td>
      <td>
      @foreach($ps->tags as $tg)
       #{{ $tg->name }}
      @endforeach
      </td>
      <td><img src="{{ asset( $ps->gambar ) }}" class="img-thumbnail" style="width: 150px;"></td>
      <td>
        
          <a href="{{ route('post.restore' , $ps->id ) }}" id="delete-post"class="btn btn-info btn-sm">Restore</a>
         
         <button type="submit" class="btn btn-danger btn-sm btn-flat btn-sm remove-user" data-id="{{ $ps->id }}" data-action="{{ route('post.kill',$ps->id) }}">Hapus</button>

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