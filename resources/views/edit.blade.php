@extends('layout')
@section('content')
  <h1>記事編集</h1>
    {{ Form::model($blog,['route' => ['blog.update',$blog->id]]) }}
        <div class='form-group'>
            {{ Form::label('title', 'タイトル:') }}
            {{ Form::text('title', null, array('placeholder' => '40文字まで','maxlength' => 40 )) }}
            @if ($errors->has('title'))
                <div class="text-danger">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>
        {{ Form::label('content', '本文:') }}
        <div class='form-group'>
            {{ Form::textarea('content', null) }}
            @if ($errors->has('content'))
                <div class="text-danger">
                    {{ $errors->first('content') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            {{ Form::submit('更新する', ['class' => 'btn btn-outline-primary']) }}
        </div>
    {{ Form::close() }}
    <div>
        <a href={{ route('blog.list') }}>一覧に戻る</a>
    </div>
  
@endsection