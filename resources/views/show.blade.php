@extends('layout')
@section('content')
  <h1>{{ $blog->title }}</h1>
  <div>
        <p>{{ $blog->created_at }}</p>
        <p>{{ $blog->content }}</p>
    </div>
    <div>
        <a href={{ route('blog.list') }}>一覧に戻る</a>
        | <a href={{ route('blog.edit', ['id' =>  $blog->id]) }}>編集</a>
    </div>
  
@endsection