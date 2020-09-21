@extends('layout')

@section('content')
    <h1>{{$item->name}}を編集する</h1>
    {{ Form::model($item, ['route' => ['items.update', $item->id]]) }}
        <div class='form-group'>
            {{ Form::label('name', 'アイテム名:') }}
            {{ Form::text('name', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('category_id', 'カテゴリ:') }}
            {{ Form::select('category_id', $categories) }}
        </div>
        <div class="form-group">
            {{ Form::submit('更新する', ['class' => 'btn btn-outline-primary']) }}
        </div>
    {{ Form::close() }}

    <div>
        <a href={{ route('items.index') }}>一覧に戻る</a>
    </div>