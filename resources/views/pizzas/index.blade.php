	<ul>	
	@foreach ($pizzas as $pizza)
	<li>
		<a href="/pizzas/{{$pizza->id}}">
			{{$pizza->name}}
		</a>
	</li>
	@endforeach
	</ul>