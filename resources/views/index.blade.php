@extends('layouts.layout')

<div class="container mt-5">
    @section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="get" action="{{ route('post.index') }}">
            <div class="mb-3">
                <label for="body" class="form-label">Поиск записей по комментариям</label>
                <input type="text" class="form-control" id="body" name="body"
                       value="{{ old("body", request()->body) }}">
            </div>
            <button type="submit" class="btn btn-primary">Поиск</button>
            <a href="{{ route('post.index') }}" class="btn btn-secondary">Сбросить фильтр</a>
        </form>

        <ul class="list-group mt-5">
            @foreach($posts as $number => $post)
                <li class="list-group-item">
                    {{ $number+1 }}: {{ $post->title}}
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">
                            @foreach($post->comments as $comment)
                                {{ $comment->body }}
                                <br>
                            @endforeach
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
</div>

@endsection
