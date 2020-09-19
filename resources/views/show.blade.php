@extends('layout')
@section('content')
  <h1>{{ $blog->title }}</h1>
  <div>
        <p>{{ $blog->created_at }}</p>
        <p><img src="{{ asset('/storage/'.$blog->image)}}" max-width="500px", height="500px"></p>
        <p>{{ $blog->content }}</p>
    </div>
    <div>
        <a href={{ route('blog.list') }}>一覧に戻る</a>
        @auth
          @if ($blog->user_id === $login_user_id)
            | <a href={{ route('blog.edit', ['id' =>  $blog->id]) }}>編集</a>
            <p></p>
            {{ Form::open(['method' => 'delete', 'route' => ['blog.destroy', $blog->id]]) }}
                {{ Form::submit('削除') }}
            {{ Form::close() }}
          @endif
        @endauth
    </div>
  
@endsection