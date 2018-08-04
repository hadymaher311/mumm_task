@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{ $category->name }} category</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" class="form-control" required placeholder="Category Name" name="name" value="{{ $category->name }}">
                        </div>
                        <button class="btn btn-primary">Edit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
