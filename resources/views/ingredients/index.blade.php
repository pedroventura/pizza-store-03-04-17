	<ul>	
	@foreach ($ingredients as $ingredient)
	<li>
		<a href="/ingredients/{{$ingredient->id}}">
			{{$ingredient->name}}
		</a>
	</li>
	@endforeach
	</ul>