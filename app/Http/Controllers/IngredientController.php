<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;


class IngredientController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$ingredients = Ingredient::all();
		return view('ingredients.index', compact('ingredients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('ingredients.create');
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
		* @todo validation data
		*/
		$ingredient = new Ingredient;
		$ingredient->name = request('name');
		$ingredient->price = request('price');
		$ingredient->save();
		return redirect('/ingredients');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Ingredient  $ingredient
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$ingredient = Ingredient::find($id);
		return view('ingredients.show', compact('ingredient'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Ingredient  $ingredient
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Ingredient $id)
	{
		$ingredient = Ingredient::find($id);
		return view('ingredients.edit', compact('ingredient'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Ingredient  $ingredient
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Ingredient $id)
	{

		$res = $this->validate($request, [
			'name' => 'required',
			'price' => 'required'
			]);

		$ingredient = Ingredient::find($id);
		$ingredient->name = request('name');
		$ingredient->price = request('price');
		$ingredient->save();
		return redirect('/ingredients');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Ingredient  $ingredient
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Ingredient $ingredient)
	{
		//
	}
}
