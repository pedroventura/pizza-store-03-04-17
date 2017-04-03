<form method="POST" action="/ingredients/{{$ingredient->id}}">

	 {!! method_field('patch') !!}

	{{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value="{{$ingredient->name}}" id="name" placeholder="Ingredient Name">
  </div>

  <div class="form-group">
    <label for="price">Pricel</label>
    <input type="text" class="form-control" id="price" value="{{$ingredient->price}}" name="price" placeholder="Ingredient Price">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>