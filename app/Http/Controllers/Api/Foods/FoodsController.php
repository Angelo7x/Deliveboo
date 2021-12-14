<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\Http\Resources\FoodsResource;

class ProductController extends Controller
{
    public function index(Request $request){
        $foods = Food::all();
        return FoodsResource::collection($foods);
}
}