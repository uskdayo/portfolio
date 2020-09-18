@extends('layout')
@section('content')
  <h1>ブログ一覧</h1>

  @foreach ($blogs as $blog)
      <p>
          {{ $blog->id }},
          {{ $blog->title }},
          {{ $blog->created_at }}
      </p>
  @endforeach
@endsection