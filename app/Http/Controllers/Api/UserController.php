<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{  
    public function index() 
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'data' => $users
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

