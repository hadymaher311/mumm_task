@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new Article</div>

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
                    
                    <form action="{{ route('article.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Article subject</label>
                            <input type="text" class="form-control" required placeholder="Article subject" name="subject" value="{{ old('subject') }}">
                        </div>

                        <div class="form-group">
                            <label for="">Article Body</label>
                            <textarea class="form-control" required placeholder="Article Body" name="body">{{ old('body') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Article Category</label>
                            <select class="form-control" required placeholder="Article Category" name="category">
                                <option value="">Choose category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        @if ($category->id == old('category'))
                                            selected 
                                        @endif
                                        >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="publish" type="checkbox" class="custom-control-input" id="customControlAutosizing" value="1">
                                <label class="custom-control-label" for="customControlAutosizing">Publish</label>
                            </div>
                        </div>

                        <button class="btn btn-success">Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
