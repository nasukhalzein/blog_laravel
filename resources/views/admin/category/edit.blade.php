@extends('template.home')

@section('title' , 'Edit Category')

@section('sub_title' , 'Edit Category')
 
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif

 <form action="{{ route('category.update' , $category->id) }}" method="post">
 	@csrf
  @method('patch')
  <div class="form-group">
    <label for="name">Category</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $category->name }}">
    @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
	@enderror
  </div>
  <button type="submit" class="btn btn-primary col-lg">Submit</button>
</form>

@stop