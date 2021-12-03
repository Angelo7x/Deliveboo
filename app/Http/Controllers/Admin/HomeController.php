<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Cuisine;
use App\Food;
use App\Order;

class HomeController extends Controller
{
    public function index() {
        return view('admin.home');
    }
}
