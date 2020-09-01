@extends('template.home')

@section('title' , 'Tambah User')

@section('sub_title' , 'Tambah User')
 
@section('content')

@if(Session::has('message'))
  <div class="alert alert-success" role="alert">
    {{ Session('message') }}
  </div>
@endif

 <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">

  @csrf

  <div class="form-group">
    <label for="name">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
    @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
    @error('email')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="category">Status User</label>
    <select class="form-control @error('status') is-invalid @enderror" name="status">
      <option value="" holder>==Pilih Status User==</option>
      <option value="1">Admin</option>
      <option value="0">Author</option>
    @error('status')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
    </select>
  </div>

	<div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
    @error('password')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>    


  <button type="submit" class="btn btn-primary col-lg">Tambah User</button>
</form>

@stop