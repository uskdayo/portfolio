@extends('layout')
@section('content')
  <h1>新規投稿</h1>
    {{ Form::open(['route' => 'blog.store']) }}
        <div class='form-group'>
            {{ Form::label('title', 'タイトル:') }}
            {{ Form::text('title', null) }}
        </div>
        {{ Form::label('content', '本文:') }}
        <div class='form-group'>
            {{ Form::textarea('content', null) }}
        </div>
        <div class="form-group">
            {{ Form::submit('作成する', ['class' => 'btn btn-outline-primary']) }}
        </div>
    {{ Form::close() }}
    <div>
        <a href={{ route('blog.list') }}>一覧に戻る</a>
    </div>
  
@endsection