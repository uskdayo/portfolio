@extends('layout')

@section('content')
    <h1>{{ $item->name }}</h1>
    <div>
        <p>{{ $item->category->name }}</p>
    </div>
    <div>
        <a href={{ route('items.index') }}>一覧に戻る</a>
        @auth
          @if ($item->user_id === $login_user_id)
            | <a href={{ route('items.edit', ['id' =>  $item->id]) }}>編集</a>
            <p></p>
            {{ Form::open(['method' => 'delete', 'route' => ['items.destroy', $item->id]]) }}
                {{ Form::submit('削除') }}
            {{ Form::close() }}
          @endif
        @endauth
    </div>
@endsection