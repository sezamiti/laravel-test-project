<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();


        return view('post.index', compact('posts'));

//        $post = Post::find(1);
//        $tag = Tag::find(1);
//        dd($tag->tags);

    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));

    }

    public function store () {

        $data = request()->validate([
            'title'=>'required | string',
            'content'=>'required |string',
            'image'=>'required |string',
            'category_id'=>'required |string',
            'tags'=>'',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post= Post::create($data);

        $post->tags()->attach($tags,  ['created_at' => new \DateTime('now')]);

        return (redirect()->route('post.index'));

    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit',compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
            'category_id'=>'string',
            'tags'=>'',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::find(2);
        $post->delete();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function reestablish()
    {

        $post = Post::find(2);
        $post->delete();
        dd('Deleted');
    }

    public function firstOrCreate()
    {

        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'SomeImage.jpg',
            'likes' => 250,
            'is_publish' => 1,
        ];
        $mypost = Post::firstOrCreate([
            'title' => 'titleCreate obraz'
        ], [
            'title' => 'titleCreate obraz',
            'content' => 'some content',
            'image' => 'SomeImage.jpg',
            'likes' => 250,
            'is_publish' => 1,
        ]);
        dump($mypost->content);
        dd('very good !');
    }

    public function updateOrCreate()
    {

        $anotherPost = [
            'title' => 'updateOrCreate some post',
            'content' => 'updateOrCreate some content',
            'image' => 'updateOrCreate SomeImage.jpg',
            'likes' => 2500,
            'is_publish' => 1,
        ];

        $mypost = Post::updateOrCreate([
            'title' => 'titleCreate123'
        ], [
            'title' => 'updateOrCreate some post',
            'content' => 'new updateOrCreate some content',
            'image' => 'updateOrCreate SomeImage.jpg',
            'likes' => 2500,
            'is_publish' => 1,
        ]);
        dump($mypost->content);
        dd('very good !');
    }
}
