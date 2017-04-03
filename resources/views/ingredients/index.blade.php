	@extends('layout')

	@section ('content')
	
	<h1>Ingredients</h1>
	
	<ul class="list-group">	
	@foreach ($ingredients as $ingredient)
	<li class="list-group-item">
		<a href="/ingredients/{{$ingredient->id}}">
			{{$ingredient->name}}
		</a>
	</li>
	@endforeach
	</ul>
	@endsection