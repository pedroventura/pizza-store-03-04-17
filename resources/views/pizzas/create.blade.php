@extends('layout')

@section ('content')

<form method="POST" action="/pizzas" enctype="multipart/form-data">

	{{ csrf_field() }}
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name" id="name" placeholder="Pizza Name" required>
	</div>

	<div class="form-group">
		<label for="Image">Image</label>
		<input type="file" class="form-control" id="image" name="image" placeholder="Ingredient Image" required>
	</div>

	<div class="form-group">
		<label for="price">Ingredients</label>
		<ul class="list-group">
			@foreach ($ingredients as $ingredient)
				<li class="list-group-item justify-content-between">
				<?php
				/**
				* @todo use a Form provider
				*/
				?>
				<label>{{$ingredient->name}}</label>
				<input name="ingredients[]" type="checkbox" value="{{$ingredient->id}}">	
				</li>
			@endforeach
		</ul>
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection