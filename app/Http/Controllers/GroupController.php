<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function store()
    {
        $data =request()->validate([
            'group_name' => 'required',
            'group_image' => '' ,
            'group_description' => '' ,
        ]); 
        Group::create([
            'group_name' => request('group_name'),
            'group_image' => request('group_image'),
            'group_description' => request('group_description')
        ]);
    }
    public function update (Group $group)
    {
        $data =request()->validate([
            'group_name' => 'required',
            'group_image' => '' ,
            'group_description' => '' ,
        ]); 
        $group->update([
            'group_name' => request('group_name'),
            'group_image' => request('group_image'),
            'group_description' => request('group_description')
        ]);
        return response()->json([
            'message' => 'Group updated successfully',
            'group' => $group->group_name
        ]);
        
    }
    public function destroy(Group $group)
    {
        $group->delete();
        return response()->json([
            'message' => 'Group deleted successfully',
            'group' => $group->group_name
        ]);
    }
}
