@extends('layout')
@section('content')
  <h1>ブログ一覧</h1>

  <table class='table table-striped table-hover'>
        <tr>
            <!-- <th>投稿者</th> -->
            <th>タイトル</th><th>投稿日</th>
        </tr>
        @foreach ($blogs as $blog)
          @if (Auth::user()->name === $blog->user->name)
            <tr>
                <!-- <td>{{ $blog->user->name }}</td> -->
                <td>
                    <a href={{ route('blog.detail', ['id' =>  $blog->id]) }}>
                    {{ $blog->title }}
                    </a>
                </td>
                <td>{{ $blog->created_at }}</td>
            </tr>
          @endif
        @endforeach
  </table>
  {{ $blogs->links() }}
  @auth
  <div>
      <a href={{ route('blog.new') }} class='btn btn-outline-primary'>新規投稿</a>
  <div>
  @endauth
@endsection