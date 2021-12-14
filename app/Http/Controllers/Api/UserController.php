<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{  
    public function index() 
    {
        $user = User::all();
        
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
    // public function filter($cuisineId)
    // {
    //     if ($cuisineId) {
    //         $user = User::whereHas('cuisines', function($query) use ($cuisineId) {
    //             $query->where('cuisine_id', $cuisineId);
    //         })
    //         ->get();
    //     }
    //     if($user) {
    //         return response()->json([
    //             'success' => true,
    //             'data' => $user
    //         ]);
    //     }
    // }   
    public function show($slug)
    {
        $user = User::where('slug', $slug)->with('foods')->first();

        if( $user ) {
            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        }

        return response()->json([
            'success' => false,
            'data' => 'Nessun ristorante trovato.'
        ]);
    }
}

