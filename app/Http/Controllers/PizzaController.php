<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\Ingredient; // @todo should not use this, use propper relation model
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::all();
		return view('pizzas.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$ingredients = Ingredient::all();
        return view('pizzas.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	/**
    	* @todo validation data. Process and save image
    	* Save ingredients to joining table ingredient_pizza
    	*/
        $pizza = new Pizza;
		$pizza->name = request('name');
		//$pizza->image = request('image');
		$pizza->save();
		return redirect('/pizzas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $id)
    {
        $pizza = Pizza::find($id);
        // retrieve all ingredientes for the current pizza
        $ingredients = array();
        $resPrice = 0;
        foreach ($pizza->ingredients as $ingredient) {
        	$ingredients[] = $ingredient->name;
        	$resPrice += $ingredient->price;
        		 
        }
        $totalPrice = ((50 / 100) * $resPrice) + $resPrice;
		return view('pizzas.show', compact('pizza' ,'ingredients', 'totalPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizza $pizza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        //
    }
}
