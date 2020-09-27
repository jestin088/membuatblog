@extends('layouts.app')


@section('content')
<!-- As a link -->
<nav class="navbar navbar-dark bg-primary mt-5">
<span class="navbar-brand mb-0 h1">
  <a class="navbar-brand" href="/post">Check Your Post!</a>
</span>
</nav>

<h1>Edit Your Article!</h1>

<form action="/post/{{$post->id}}" method="Post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <x-input field="title" label="Judul" type="text" value="{{$post->title}}"/>
    <x-textarea field="body" label="body" value="{{$post->body}}"/>
    
    @if($post->thumbnail)
    <img src="/image/{{$post->thumbnail}}" width="150">
    @else
    <p>
      Kamu Belum Upload Thumbnail
    </p>
    @endif
    <x-inputfile />

    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
