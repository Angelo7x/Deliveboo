<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Cuisine;
class UserController extends Controller
{  
    // public function index() 
    // {
    //     $user = User::all();
        
    //     if( $user ) {
    //         return response()->json([
    //             'success' => true,
    //             'data' => $user
    //         ]);
    //     }
    // }
    public function index($cuisineId)
    {
        if ($cuisineId == 'all') {
            $user = User::all();
        } else {
            $user = User::whereHas('cuisines', function($query) use ($cuisineId) {
                $query->where('cuisine_id', $cuisineId);
            })
            ->get();
        }
        return response()->json([
            'success' => true,
            'data' => $user,
            // 'cuisines' => $user->cuisines
        ]);
    }   
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

