<h1>{{ $pizza->name }}</h1>
<br />
Ingredients:
<br />
<ul>	
	@foreach ($ingredients as $ingredient)
	<li>
		{{$ingredient}}
		
	</li>
	@endforeach
</ul>

Price: {{$totalPrice}}

