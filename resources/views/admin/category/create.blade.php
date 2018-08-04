@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new Category</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                    
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" class="form-control" required placeholder="Category Name" name="name" value="{{ old('name') }}">
                        </div>
                        <button class="btn btn-success">Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
