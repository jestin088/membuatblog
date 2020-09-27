@extends('layouts.app')

@section('title', 'Halaman Artikel')


@section('content')
<p>
  <h1>Ini Halaman Artikel</h1>
</p>

<nav class="navbar navbar-dark bg-primary mb-2 mt-5">
  <span class="navbar-brand mb-2 h1">
    <a class="navbar-brand" href="/post/create">Make Some Articles Here!</a>
  </span>
</nav>
@foreach($posts as $post)
<div class="card mb-2">
  <img class="card-img-top" src="/image/{{$post->thumbnail}}" alt="Card image cap">
  <div class="card-body">
    <p><strong>{{ ucfirst ($post->title) }}</strong></p>
    <p>{{ Str::limit( $post->body, 200) }}</p>
    <a href='/post/{{ $post->slug }}'>Read more</a>
    <a href='/post/{{ $post->id }}/edit' class="btn btn-info btn-sm">Edit</a>
    <form action="/post/{{ $post->id }}" method="post">

      @csrf
      @method('DELETE')
      <button class="btn btn-sm btn-danger">Hapus</button>
      <div class="card-footer">
        Published on {{ $post->created_at->format("d M, Y") }}
      </div>
    </form>
  </div>
</div>

</div>
@endforeach

<div>
  {{ $posts->links() }}
</div>

@endsection