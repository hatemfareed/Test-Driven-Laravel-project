<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;



class ProfileController extends Controller
{
    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'image_profile' => '',
            'specialty' => 'required',
            'bio' => ''
        ]);
        Profile::create([
            'name' => request('name'),
            'image_profile' => request('image_profile'),
            'specialty' => request('specialty'),
            'bio' => request('bio') 
        ]);
    }
    public function update(Profile $profile){
        $data = request()->validate([
            'name' => 'required',
            'image_profile' => '',
            'specialty' => 'required',
            'bio' => ''
        ]);
        $profile->update($data);
        return response()->json([
            'message' => 'Profile updated successfully',
            'data' => $profile->name
        ]);
    }
}
