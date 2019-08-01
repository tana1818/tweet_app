@extends('layout')

@section('content')
<div class="mt-4 text-center">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        投稿を新規作成する
    </a>
</div>

    <div class="container mt-4">
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(str_limit($post->body, 200))) !!}
                    </p>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif

                    <span class="mr-2">
                        <a class="badge badge-primary" href="{{ route('posts.show', ['post' => $post]) }}">
                            詳細
                        </a>
                    </span>
                    
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
            