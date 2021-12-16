<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{  
    public function index() 
    {
        $user = User::with(['cuisines'])->get();

        if( $user ) {
            return response()->json([
                'success' => true,
                'data' => $user,
            ]);
        }
    }
    public function filter($cuisineId)
    {
<<<<<<< HEAD
        if ($cuisineId) {
            $user = User::whereHas('cuisines', function($query) use ($cuisineId) {
=======
        if ($cuisineId == 'all') {
            $users = User::all();
        } else {
            $users = User::whereHas('cuisines', function($query) use ($cuisineId) {
>>>>>>> origin/main
                $query->where('cuisine_id', $cuisineId);
            })
            ->get();
        }
<<<<<<< HEAD
        if($user) {
            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        }
    }   
    public function show($id)
    {
        $user = User::where('id', $id)->with('foods')->first();
=======
        foreach ($users as $user) {
            $cuisines = [];
            $cuisines = $user->cuisines;
            $user->cuisines = $cuisines;
        };
        if($users) {
            return response()->json([
                'success' => true,
                'data' => $users,
            ]);
        }
    }   
>>>>>>> origin/main

    public function show($slug)
    {
        // $user = User::where('slug', $slug)->with('foods')->first();
        $user = User::where('slug', $slug)->with('foods')->firstOrFail();
        if( $user ) {
            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        }

        return response()->json([
            'success' => false,
<<<<<<< HEAD
            'data' => null
=======
            'data' => ''
>>>>>>> origin/main
        ]);
    }
}

