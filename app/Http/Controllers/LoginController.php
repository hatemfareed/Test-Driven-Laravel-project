<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{

    public function store()
    {
        $data = request()->validate([
            'email' => 'required',
            'token' => 'required',
        ]);

        Login::create([
            'email' => request("email"),
            'token' => request("token"),
        ]);
        $token = Login::where('email', request("email"))->first();

        return response()->json([
            'message' => 'Login success' ,
            'token' => $token->token ,
        ] ,200);
        
    }
    public function getToken(Login $token)
    {
        $data = request()->validate([
            'email' => 'required',
            'token' => 'required',
        ]);
        $token->update($data) ;        
        
        return response()->json([
            'message' => 'Login success' ,
            'tokenR' => $token->token ,
        ] ,200);

    }
}
