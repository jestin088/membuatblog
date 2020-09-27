@extends('layouts.app')


@section('content')
<p>
<h1>{{ $post->title }}</h1>
<p>
    {{ $post->body }}
</p>
</p>
<a href="/post" class="btn btn-sm btn-info"></div>back</a>
@endsection
