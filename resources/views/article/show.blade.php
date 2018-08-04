@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $article->subject }} <small class="float-right text-success">{{ $article->category->name }}</small></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {!! $article->body !!}


                </div>
            </div>

            <h4 class="pt-3">Comments</h4>
            <div class="list-group">
                @foreach ($comments as $comment)
                  <span class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h6 class="mb-1">Commented by <b>{{ $comment->user->name }}</b></h6>
                      <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-1">{{ $comment->body }}</p>
                  </span>
                @endforeach
            </div>

            @auth
                <form action="{{ route('article.comment', $article->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Write your comment</label>
                        <input type="text" autofocus placeholder="Write your comment..." class="form-control" name="body" value="{{ old('body') }}" required>
                    </div>
                    <button class="btn btn-primary">Comment</button>
                </form>    
            @else
                <div>
                    <a href="{{ route('login') }}">Login to comment on this article</a>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection
