@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Articles <span><a href="{{ route('article.create') }}" class="float-right btn btn-success btn-sm">Add new article</a></span></div>

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
                                
                                <a href="{{ route('article.show', $article->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $article->subject }}</h5>
                                        @if ($article->published_at)
                                            <small class="text-success">Published</small>
                                        @else
                                            <small class="text-danger">Not published</small>
                                        @endif
                                    </div>
                                    <p class="mb-1 text-truncate">{!! $article->body !!}</p>
                                    <small class="text-muted"><b>Category:</b> {{ $article->category->name }}</small>
                                </a>

                                <span class="list-group-item list-group-item-action font-weight-bold">
                                    <small class="text-right">{{ $article->created_at->diffForHumans() }}</small>

                                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-warning btn-sm float-right">Edit</a>

                                    <form action="{{ route('article.destroy', $article->id) }}" method="POST" class="float-right">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm">
                                            &times;
                                        </button>
                                    </form>

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
