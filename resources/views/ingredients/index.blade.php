	@extends('layout')

	@section ('content')
	
	<div class="row">
		<div class="col-12">
			<h1>Ingredients List</h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-11">
			<ul class="list-group">
			@foreach ($ingredients as $ingredient)
				<li class="list-group-item justify-content-between">
					<a href="/ingredients/{{$ingredient->id}}">
					{{$ingredient->name}}
					</a>
					<div class="bd-example" data-example-id="">
						<a role="button" href="/ingredients/edit/{{$ingredient->id}}" class="btn btn-primary btn-sm">Edit</a>
						<form method="POST" action="/ingredients/{{$ingredient->id}}" accept-charset="UTF-8">
							{{ csrf_field() }}
							{!! method_field('delete') !!}
							<input class="btn btn-danger btn-sm" type="submit" value="Delete">
						</form>
					</div>
				</li>
			@endforeach
			</ul>
		</div>
		<div class="col-1">
			<a class="btn btn-success" href="/ingredients/create" role="button">Create</a>
		</div>
	</div>
	
	@endsection