@extends('template.home')

@section('title' , 'Tambah Category')

@section('sub_title' , 'Tambah Category')
 
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif

 <form action="{{ route('category.store') }}" method="post">
 	@csrf
  <div class="form-group">
    <label for="name">Category</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
    @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
	@enderror
  </div>
  <button type="submit" class="btn btn-primary col-lg">Submit</button>
</form>

@stop