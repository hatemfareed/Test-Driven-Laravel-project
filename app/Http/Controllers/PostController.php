<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'user_name'=>'required',
            'group_id'=>'required',
            'post_content'=>'required',
        ]);
        Post::create($data);
    }
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
