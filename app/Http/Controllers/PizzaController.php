<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
		// disallow view to show json data
		// @todo include .json extension to dispatch method to make html and json compatible
		return view('pizzas.index', compact('pizzas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$ingredients = DB::table('ingredients')->get();
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
		// save image. // @todo validate image and extension. 
		if ($request->hasFile('image')) {
			$path = $request->file('image')->store('img','public');
		}

		$pizza = new Pizza;
		$pizza->name = request('name');
		
		if (!empty($path)) {
			$pizza->image = $path;
		}

		// retrieve all ingredients
		$ingredients = $request->input('ingredients');
		$pizza->save();
		// save all ingredients
		$pizza->Ingredient()->attach($ingredients);

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
		$ingredients = $pizza->Ingredient()->get();
		$totalPrice = self::__setTotalPrice($ingredients);
		return view('pizzas.show', compact('pizza' ,'ingredients', 'totalPrice'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Pizza  $pizza
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Pizza $id)
	{
		$pizza = Pizza::with('Ingredient')->find($id);
		// get all ingredients
		$ingredients = DB::table('ingredients')->get();
		return view('pizzas.edit', compact('pizza','ingredients'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Pizza  $pizza
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Pizza $id)
	{
		$res = $this->validate($request, [
			'name' => 'required',
			]);

		if ($request->hasFile('image')) {
			$path = $request->file('image')->store('img','public');
		}

		$pizza = Pizza::find($id);
		$pizza->name = request('name');
		if (!empty($path)) {
			$pizza->image = $path;
		}
		// retrieve all ingredients
		$ingredients = $request->input('ingredients');
		$pizza->save();
		// save all ingredients
		$pizza->Ingredient()->sync($ingredients);

		return redirect('/pizzas');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Pizza  $pizza
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Pizza $id)
	{
		$pizza = Pizza::findOrFail($id);
		$pizza->Ingredient()->detach();
		File::delete(storage_path() . '/app/public/'. $pizza->image);
		$res = $pizza->delete();
		return redirect('/pizzas');
	}

	/**
	* calculate total Price for a Pizza
	*/
	protected function __setTotalPrice($ingredients = array()) 
	{
		$resPrice = 0;
		foreach ($ingredients as $ingredient) {
			$resPrice += $ingredient->price;
		}
		return ((50 / 100) * $resPrice) + $resPrice;
	}
}
