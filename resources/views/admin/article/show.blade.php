@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $article->subject }} <a href="{{ route('article.edit', $article->id) }}" class="btn btn-warning btn-sm float-right">Edit</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {!! $article->body !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
