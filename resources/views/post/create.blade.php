@extends('layouts.app')


@section('content')
<!-- As a link -->
<nav class="navbar navbar-dark bg-primary mt-5">
<span class="navbar-brand mb-0 h1">
  <a class="navbar-brand" href="/post">Check Your Post!</a>
</span>
</nav>

<h1>Bikin artikel Baru</h1>

<form action="/post" method="Post" enctype="multipart/form-data">
    @csrf
    <x-input field="title" label="Judul" type="text"/>
    <x-textarea field="body" label="body"/>
    
    <x-inputfile />
    

    <button type="submit" class="btn btn-primary">Submit</button>

@endsection
