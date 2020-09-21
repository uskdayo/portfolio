@extends('layout')

@section('content')
    <h1>{{ $item->name }}</h1>
    <div>
        <p>{{ $item->category->name }}</p>
    </div>
    <div>
        <a href={{ route('items.index') }}>一覧に戻る</a>
        | <a href={{ route('items.edit', ['id' =>  $item->id]) }}>編集</a>
        <p></p>
        {{ Form::open(['method' => 'delete', 'route' => ['items.destroy', $item->id]]) }}
            {{ Form::submit('削除') }}
        {{ Form::close() }}
    </div>
@endsection