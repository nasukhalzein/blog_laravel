@extends('template.home')

@section('title' , 'Edit User')

@section('sub_title' , 'Edit User')
 
@section('content')

@if(Session::has('message'))
  <div class="alert alert-success" role="alert">
    {{ Session('message') }}
  </div>
@endif

 <form action="{{ route('user.update' , $user->id) }}" method="post" enctype="multipart/form-data">

  @csrf
  @method('put')
  <div class="form-group">
    <label for="name">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
    @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" readonly>
    @error('email')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="category">Status User</label>
    <select class="form-control @error('status') is-invalid @enderror" name="status">
       <option value="" holder>==Pilih Status User==</option>
      <option value="1"
      @if($user->status == 1)
      selected
      @endif
      >Admin</option>
      <option value="0"
      @if($user->status == 0)
      selected
      @endif
      >Author</option>
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