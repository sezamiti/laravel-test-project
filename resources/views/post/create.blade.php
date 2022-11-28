@extends('layouts.main')

@section('content')
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input value="{{ old('title') }}" name="title" type="text" class="form-control" id="title"
                   placeholder="title">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea name="content" class="form-control" id="content" placeholder="content">{{ old('content') }}</textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input value="{{ old('image') }}" name="image" type="text" class="form-control" id="image"
                   placeholder="image">
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="select">
            <label for="category">Category</label>
            <select class="form-select" aria-label="category" name="category_id">
                @foreach($categories as $category)
                    <option
                    {{old('category_id') == $category->id ? ' selected': ''}}
                     value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="category">Tags</label>
            <select class="form-select" multiple id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-info mt-3">Create</button>
    </form>
@endsection
