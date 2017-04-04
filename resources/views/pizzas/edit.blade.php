@extends('layout')

@section ('content')

<div class="row">
	<div class="col-12">
		<h1>Edit Pizza</h1>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<form method="POST" action="/pizzas/{{$pizza->id}}" enctype="multipart/form-data">
			{!! method_field('patch') !!}
			{{ csrf_field() }}

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" value="{{$pizza->name}}" name="name" id="name" placeholder="Pizza Name" required>
			</div>

			<div class="form-group">
				<label for="Image">Image</label>
				<img src="/storage/{{ $pizza->image }}" class="img-fluid" alt="{{ $pizza->name }}">
				<input type="file" class="form-control" id="image" name="image" placeholder="Ingredient Image">
			</div>

			<div class="form-group">
				<label for="price">Ingredients</label>
				<ul class="list-group">
					@foreach ($ingredients as $ingredient)
						<li class="list-group-item justify-content-between">
						<label>{{$ingredient->name}}</label>
						
						{{--
						-- Set ingredients of the pizza
						--}}
						@php ($ingredientExits = false)
						@foreach ($pizza->Ingredient as $selectIngredient)
							@if ($selectIngredient->id == $ingredient->id)
								@php ($ingredientExits = true)
							@endif
						@endforeach

						@if ($ingredientExits)
							<input name="ingredients[]" type="checkbox" value="{{$ingredient->id}}" checked>
						@else
							<input name="ingredients[]" type="checkbox" value="{{$ingredient->id}}">
						@endif
						</li>
					@endforeach
				</ul>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>

@endsection