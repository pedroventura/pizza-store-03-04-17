	@extends('layout')

	@section ('content')
	
	<div class="row">
		<div class="col-12">
			<h1>Pizzas List</h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-11">
			<ul class="list-group">
			@foreach ($pizzas as $pizza)
				<li class="list-group-item justify-content-between">
					<a href="/pizzas/{{$pizza->id}}">
					{{$pizza->name}}
					</a>
					<div class="bd-example" data-example-id="">
						<a role="button" href="/pizzas/edit/{{$pizza->id}}" class="btn btn-primary btn-sm">Edit</a>
						<form method="POST" action="/pizzas/{{$pizza->id}}" accept-charset="UTF-8">
							{{ csrf_field() }}
							{!! method_field('delete') !!}
							<input class="btn btn-danger btn-sm" type="submit" value="Delete">
						</form>
					</div>
			@endforeach
			</ul>
		</div>
		<div class="col-1">
			<a class="btn btn-success" href="/pizzas/create" role="button">Create</a>
		</div>
	</div>
	
	@endsection