<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_post_in_group()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/home/group/post',[
            'user_name'=>'John',
            'group_id'=>'1',
            'post_content'=>'This is a test post'
        ]);

        $response->assertOk();
        $this->assertCount(1, Post::all());
    }
    
    public function test_user_can_delete_post()
    {
        $this->withoutExceptionHandling();
        $this->post('/home/group/post',[
            'user_name'=>'John',
            'group_id'=>'1',
            'post_content'=>'This is a test post'
        ]);

        $post = Post::first();
        $response = $this->delete('/home/group/post/'.$post->id);
        $response->assertOk();
        $this->assertCount(0, Post::all());
    }

}
