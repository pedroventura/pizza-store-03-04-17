@extends('layout')

@section ('content')
<div class="row">
	<div class="col-12">
		<h1>Ingredient</h1>
	</div>
</div>



<div class="row">
	<div class="col-12">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
					<th>Name</th>
					<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td><p>{{ $ingredient->name }}</p></td>
					<td><p>{{ $ingredient->price }}</p></td>
					</tr>
				</tbody>
			</table>
		</div>
		<p><a class="btn btn-primary" href="/ingredients" role="button"><< Back</a></p>
	</div>
</div>
@endsection