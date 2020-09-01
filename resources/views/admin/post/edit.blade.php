@extends('template.home')

@section('title' , 'Edit Post')

@section('sub_title' , 'Edit Post')
 
@section('content')

@if(Session::has('message'))
  <div class="alert alert-success" role="alert">
    {{ Session('message') }}
  </div>
@endif

 <form action="{{ route('post.update' , $post->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('patch')
  <div class="form-group">
    <label for="judul">Judul Post</label>
    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $post->judul }}">
    @error('judul')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="category">Category Post</label>
    <select class="form-control" name="category_id">
      <option value="" holder>==Pilih Category==</option>
      @foreach($category as $ct)
      <option value="{{ $ct->id }}"
        @if($post->category_id == $ct->id)
         selected 
        @endif
        >{{ $ct->name }}</option>
      @endforeach
    </select>
     @error('category_id')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="category">Tag</label>
  <select id="demo" multiple="multiple" class="form-control" name="tags[]">
    @foreach($tag as $tg)
    <option value="{{ $tg->id }}"
      @foreach($post->tags as $value)
        @if($tg->id == $value->id)
        selected
        @endif
      @endforeach
      >{{ $tg->name }}</option>
    @endforeach
</select>
 @error('tags[]')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="content">Content Post</label>
   <textarea class="form-control @error('content') is-invalid @enderror" name="content">{{ $post->content }}</textarea>
    @error('content')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="gambar">Thumbnail Post</label>
    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ $post->gambar }}">
    @error('gambar')
             <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  </div>


  <button type="submit" class="btn btn-primary col-lg">Submit</button>
</form>

@stop