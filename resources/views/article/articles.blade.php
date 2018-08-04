@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Choose the article</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <small>Tab to view</small>
                    <div class="row">
                        @foreach ($articles as $article)
                            <div class="col-md-6 pb-3">
                                
                                <a href="{{ url('article', $article->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $article->subject }}</h5>
                                    </div>
                                    <p class="mb-1 text-truncate">{!! $article->body !!}</p>
                                    <small class="text-muted"><b>Category:</b> {{ $article->category->name }}</small>
                                </a>

                                <span class="list-group-item list-group-item-action font-weight-bold">
                                    <small class="text-right">{{ Carbon\Carbon::createFromTimeString($article->published_at)->diffForHumans() }}</small>

                                </span>
                            </div>
                        @endforeach
                    </div>
                    <div class="float-right">
                        {{ $articles->links() }}
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
