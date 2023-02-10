<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Group;

class GroupTest extends TestCase
{
    use RefreshDatabase; // this will refresh the database after each test

    public function test_to_create_group()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/home/group', [
            'group_name' => 'test',
            'group_image' => 'test.jpg',
            'group_description' => 'nice group for testing'
        ]);
        $response->assertOk();
        $this->assertCount(1, Group::all());
    }

    public function test_to_update_group()
    {
        $this->withoutExceptionHandling();

        $this->post('/home/group', [
            'group_name' => 'test',
            'group_image' => 'test.jpg',
            'group_description' => 'nice group for testing'
        ]);

        $group = Group::first();

        $response = $this->patch('/home/group/' . $group->id, [
            'group_name' => 'test',
            'group_image' => 'test2.jpg',
            'group_description' => 'nice group for testing2'
        ]);
        $update_group = Group::first();
        
        $response->assertJson([
            'message' => 'Group updated successfully',
            'group' => $group->group_name
        ]);
    }
    public function test_to_delete_group()
    {
        $this->withoutExceptionHandling();

        $this->post('/home/group', [
            'group_name' => 'test',
            'group_image' => 'test.jpg',
            'group_description' => 'nice group for testing'
        ]);

        $group = Group::first();

        $response = $this->delete('/home/group/' . $group->id);
        
        $this->assertCount(0, Group::all());
        $response->assertJson([
            'message' => 'Group deleted successfully',
            'group' => $group->group_name
        ]);
    }
}
