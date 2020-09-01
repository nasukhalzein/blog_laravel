@extends('template.home')

@section('title' , 'Edit Tag')

@section('sub_title' , 'Edit Tag')
 
@section('content')

@if(Session::has('message'))
	<div class="alert alert-success" role="alert">
		{{ Session('message') }}
	</div>
@endif

 <form action="{{ route('tag.update' , $tag->id) }}" method="post">
 	@csrf
  @method('patch')
  <div class="form-group">
    <label for="name">Tag</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $tag->name }}">
    @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
	@enderror
  </div>
  <button type="submit" class="btn btn-primary col-lg">Simpan Tag</button>
</form>

@stop