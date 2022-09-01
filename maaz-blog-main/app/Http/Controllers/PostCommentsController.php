<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{

    public function store(Post $post)
    {
        request()->validate(['body' => 'required']);

        $post->comments()->create([
            'post_id' => $post->id,
            'user_id'=>auth()->id(),
            'body' => request('body')
        ]);

        return back();

    }

    function delete($id)
    {
        comment::where('id', $id)->delete();
        return back();
    }
}
