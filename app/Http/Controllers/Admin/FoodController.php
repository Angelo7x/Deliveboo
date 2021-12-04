<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Food;

class FoodController extends Controller
{

    protected $validationRules = [
        'name' => 'string |required | max:50',
        'image' => 'string|url|required | max:255',
        'description' => 'string |nullable | max:255',
        'allergens' => 'string |nullable | max:100',
        'price' => 'required|numeric|between: 0, 999.99',
        'weight' => 'string|numeric| nullable|max:30',
        'visible' => 'required|boolean'

    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Food $food)
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $newFood = new Food ();
        $newFood->fill($request->all());

        $newFood->user_id = Auth::id();

        $newFood->save();

        return redirect()->route("admin.home");
        // ->with('success',"Il post è stato creato") da aggiungere dopo boot
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {

        // if( $food->user_id != Auth::id() ) {
        //     abort("403");
        // }

        $food->delete();

        return redirect()->route("admin.home");
        // ->with('success',"Il post {$post->id} è stato eliminato") da aggiungere 
    }
}
