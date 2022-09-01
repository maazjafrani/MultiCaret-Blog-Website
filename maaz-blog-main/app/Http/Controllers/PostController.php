<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('post', [
            'post' => $post,
            'comments' => $post->comments,   //passing all the related comments of a particular post to the post view
            'posts' => $post->category->posts()->where('id', '!=', $post->id)->get(),
            'categories' => Category::all(),


        ]);
    }

    public function create()
    {
        $dataCategory = Category::all();
        $dataTag = Tag::all();
        return view('publish_post', [
            'dataCategory' => $dataCategory,
            'dataTag' => $dataTag
        ]);

    }


    public function store(Request $request)
    {
//
        if ($request->hasFile('image')) {

            $requestData = $request->all();
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $requestData['image'] = '/storage/' . $path;
        } else {
            $requestData = $request->all();
            $path = '/storage/images/defaultImage.jpg';
            $requestData['image'] = $path;      //add default image if user doesnt select any image


        }
        $request->validate([
            'content_name' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required',
            'image' => 'required'

        ]);
        $requestData['user_id'] = auth()->id();
        Post::create($requestData);


//
//        $request->validate([
//            'content_name' => 'required',
//            'excerpt' => 'required',
//            'content' => 'required',
//            'category_id' => 'required',
//            'tag_id' => 'required',
//            'image' => 'required'
//
//        ]);
//        Post::create($requestData);

//
//        $input = $request->all();
//        $image = $request->image;
//        $name = $image->getClientOriginalName();
//        $image->storeAs('public/images', $name);
//        $input['image'] = $name;

//        $input['user_id'] = auth()->id();
//        Post::create($input);


//        $attributes = $request->validate([
//            'content_name' => 'required',
//            'excerpt' => 'required',
//            'content' => 'required',
//            'category_id' => 'required',
//            'tag_id' => 'required'
//
//        ]);

//        $attributes['user_id']=auth()->id();
//
//        Post::create($attributes);
        return redirect('/');
    }
}
