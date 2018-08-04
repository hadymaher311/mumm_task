@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories <span><a href="{{ route('category.create') }}" class="float-right btn btn-success btn-sm">Add new category</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <small>Tab to edit</small>
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-md-6 text-truncate pb-3">
                                <a href="{{ route('category.edit', $category->id) }}" class="list-group-item list-group-item-action font-weight-bold">
                                    {{ $category->name }}
                                    <small class="text-right">{{ $category->created_at->diffForHumans() }}</small>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="float-right">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm">
                                            &times;
                                        </button>
                                    </form>
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
