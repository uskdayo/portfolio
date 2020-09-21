@extends('layout')
@section('content')
  <h1>所有アイテム一覧</h1>

  <table class='table table-striped table-hover'>
        <tr>
          <th>カテゴリー</th><th>アイテム名</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->category->name }}</td>
                <td>
                  <a href={{ route('items.show', ['id' =>  $item->id]) }}>
                  {{ $item->name }}
                  </a>
                </td>
            </tr>
        @endforeach
  </table>
  <div>
    <a href={{ route('items.new') }} class='btn btn-outline-primary'>新しいアイテム</a>
  <div>
@endsection
