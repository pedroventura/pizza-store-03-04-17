@extends('layout')

@section ('content')
<div class="row">
	<div class="col-12">
		<h1>Pizza details &amp; price</h1>
	</div>
</div>



<div class="row">
	<div class="col-6">
		<div class="table-responsive">
			<img src="/storage/{{ $pizza->image }}" class="img-fluid" alt="{{ $pizza->name }}">
			<table class="table table-striped">
				<thead>
					<tr>
					<th>Name</th>
					<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><p>{{ $pizza->name }}</p></td>
						<td><p>{{ $totalPrice }}</p></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-6">
		<p>Ingredients</p>
		<ul class="list-group">
			@foreach ($ingredients as $ingredient)
				<li class="list-group-item justify-content-between">
					{{$ingredient->name}}
				</li>
			@endforeach
		</ul>
	</div>
	<p><a class="btn btn-primary" href="/pizzas" role="button"><< Back</a></p>
</div>
@endsection