<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

/*     public function index(Request $request)
    {
        $restaurants = User::whereIn('cuisines', $request -> cuisines ) -> get();

        return response()->json([
            'success' => true,
            'data' => $restaurants['business_name']
        ]);
    } */
    public function index($name) 
    {
        $users = User::where('name',  $name)->get();
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }
}
