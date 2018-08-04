@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Choose the category to view articles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 text-truncate pb-3">
                                <a href="{{ url('articles') }}" class="list-group-item list-group-item-action font-weight-bold">
                                    All
                                </a>
                            </div>
                        @foreach ($categories as $category)
                            <div class="col-md-6 text-truncate pb-3">
                                <a href="{{ url('articles', $category->id) }}" class="list-group-item list-group-item-action font-weight-bold">
                                    {{ $category->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="float-right">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
