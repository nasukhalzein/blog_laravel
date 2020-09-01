@extends('template.home')

@section('title' , 'Tambah Post')

@section('sub_title' , 'Tambah Post')
 
@section('content')

@if(Session::has('message'))
  <div class="alert alert-success" role="alert">
    {{ Session('message') }}
  </div>
@endif

 <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="judul">Judul Post</label>
    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}">
    @error('judul')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="category">Category Post</label>
    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
      <option value="" holder>==Pilih Category==</option>
      @foreach($category as $ct)
      <option value="{{ $ct->id }}">{{ $ct->name }}</option>
      @endforeach
      @error('category_id')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
    </select>
  </div>

  <div class="form-group">
    <label for="category">Tag</label>
  <select id="demo" multiple="multiple" class="form-control" name="tags[]">
    @foreach($tag as $tg)
    <option value="{{ $tg->id }}">{{ $tg->name }}</option>
    @endforeach
</select>
@error('tags')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="content">Content Post</label>
   <textarea class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}"></textarea>
    @error('content')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="gambar">Thumbnail Post</label>
    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
    @error('gambar')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>


  <button type="submit" class="btn btn-primary col-lg">Submit</button>
</form>

@stop