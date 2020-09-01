@extends('template.home')

@section('title' , 'Tambah Tag')

@section('sub_title' , 'Tambah Tag')
 
@section('content')

@if(Session::has('message'))
	<div class="alert alert-success" role="alert">
		{{ Session('message') }}
	</div>
@endif

 <form action="{{ route('tag.store') }}" method="post">
 	@csrf
  <div class="form-group">
    <label for="name">Tag</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
    @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
	@enderror
  </div>
  <button type="submit" class="btn btn-primary col-lg">Simpan Tag</button>
</form>

@stop