@extends('layouts.main')

@section('content')
    <form action="{{route('post.update', $post -> id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="title"
                   value="{{$post->title}}">

        </div>
        <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea name="content" class="form-control" id="content"
                      placeholder="content">{{$post->content}}</textarea>

        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="image"
                   value="{{$post->image}}">
        </div>

        <div class="select">
            <label for="category">Category</label>
            <select class="form-select" aria-label="category" name="category_id">
                @foreach($categories as $category)

                    <option
                        {{$category->id === $post->category->id ? ' selected': ''}}

                        value="{{$category->id}}">{{$category->title}} </option>
                @endforeach
            </select>

            <div>
                <label for="category">Tags</label>
                <select class="form-select" multiple id="tags" name="tags[]">

                    @foreach($tags as $tag)

                        <option
                            @foreach($post->tags as $postTag)
                            {{$tag->id === $postTag->id ? ' selected': ''}}
                            @endforeach
                            value="{{$tag->id}}">{{$tag->title}}</option>

                    @endforeach
                </select>

            </div>

        </div>

        <button type="submit" class="btn btn-info mt-3">update</button>
    </form>
@endsection
