<form method="POST" action="/pizzas">

	{{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Pizza Name">
  </div>
  
  <div class="form-group">
    <label for="price">Pricel</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="Ingredient image">
  </div>
  <div class="form-group">
    <label for="price">Ingredients</label>
    <ul>	
	@foreach ($ingredients as $ingredient)
	<li>
		<?php
		/**
		* @todo use a Form provider
		*/
		?>
		<label>{{$ingredient->name}}</label>
		<input name="{{$ingredient->name}}" type="checkbox" value="">	
	</li>
	@endforeach
	</ul>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>