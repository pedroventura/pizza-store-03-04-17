@extends('layout')

@section ('content')

<div class="row">
	<div class="col-12">
		<h1>Create Ingredient</h1>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<form method="POST" action="/ingredients">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Ingredient Name" required>
			</div>
			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" class="form-control" id="price"  name="price" placeholder="Ingredient Price" required>
			</div>
			<a href="/ingredients" role="button" href="#" class="btn btn-secondary">Back</a>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection