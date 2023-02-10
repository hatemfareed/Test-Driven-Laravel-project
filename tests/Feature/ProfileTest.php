<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Profile ;

class ProfileTest extends TestCase
{
    use RefreshDatabase; // this will refresh the database after each test

    public function test_user_can_add_data_in_profile()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/home/profile',[
            'name' => 'John Doe',
            'image_profile' => 'image.jpg',
            'specialty' => 'Atom scientist',
            'bio' => 'This is a bio of John Doe',
        ]);
        $response->assertOk();
        $this->assertCount(1, Profile::all());
    }
    public function test_user_can_update_data_in_profile()
    {
        $this->withoutExceptionHandling();

        $this->post('/home/profile',[
            'name' => 'John Doe',
            'image_profile' => 'image.jpg',
            'specialty' => 'Atom scientist',
            'bio' => 'This is a bio of John Doe',
        ]);
        $profile = Profile::first();
        $response = $this->patch('/home/profile/' . $profile->id,[
            'name' => 'John Doe',
            'image_profile' => 'image2.jpg',
            'specialty' => 'Atom scientist',
            'bio' => 'im John Doe and this is my bio updated',
        ]);
        $profile_update = Profile::first(); 

        $response->assertJson([
            'message' => 'Profile updated successfully',
            'data' =>$profile_update->name 
        ]);
    }
}
