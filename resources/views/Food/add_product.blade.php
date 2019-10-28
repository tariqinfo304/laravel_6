@extends('../Layouts/layout')

@section("slider")
@endsection


@section("body-content")

<div class="container">

    <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ url('add_product') }}" role="form">
    	@csrf()
        <h2>Add Product</h2>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
                <input  name="name" type="text" id="Name" placeholder="Name" class="form-control" autofocus>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Price</label>
            <div class="col-sm-9">
                <input  name="price" type="text" id="price" placeholder="price" class="form-control" autofocus>
                @error('price')
                    <div class="alert alert-danger">{{ $price }}</div>
                @enderror
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary btn-block">Add Product</button>
    </form>
</div>
<hr/>

@endsection