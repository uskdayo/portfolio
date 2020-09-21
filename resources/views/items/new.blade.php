@extends('layout')

@section('content')
    <h1>新しいアイテム登録</h1>
    {{ Form::open(['route' => 'items.store',"enctype"=>"multipart/form-data"]) }}
        <div class='form-group'>
            {{ Form::label('name', 'アイテム名:') }}
            {{ Form::text('name', null) }}
        </div>
        <div class='form-group'>
            {{Form::file('thefile')}}
        </div>
        <div class='form-group'>
            {{ Form::label('category_id', 'カテゴリ:') }}
            {{ Form::select('category_id', $categories) }}
        </div>
        <div class="form-group">
            {{ Form::submit('作成する', ['class' => 'btn btn-outline-primary']) }}
        </div>
    {{ Form::close() }}

    <div>
        <a href={{ route('items.index') }}>一覧に戻る</a>
    </div>

@endsection