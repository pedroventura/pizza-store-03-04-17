@extends('layout')

@section ('content')

<div class="row">
	<div class="col-12">
		<h1>Edit Ingredient Form</h1>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<form method="POST" action="/ingredients/{{$ingredient->id}}">
			{!! method_field('patch') !!}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" value="{{$ingredient->name}}" id="name" placeholder="Ingredient Name" required>
			</div>
			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" class="form-control" id="price" value="{{$ingredient->price}}" name="price" placeholder="Ingredient Price" required>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection