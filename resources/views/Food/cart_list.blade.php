@extends('../Layouts/layout')

@section("slider")
@endsection

@section("body-content")
		
	<div class="container">
		
		<div class="row">
			<table class="table table-hover">
			    <thead>
			        <tr>
			            <th>Name</th>
			            <th>Product</th>
			            <th>Price</th>
			            <th>Quantity</th>
			            <th>Delete</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($data as $row)
			    		<tr>
			    			<td>{{ $row->user_name }}</td>
			    			<td>{{ $row->p_name }}</td>
			    			<td>{{ $row->price }}</td>
			    			<td>{{ $row->quantity }}</td>
			    			<td><a href="{{ url('/delete_cart',$row->c_id) }}">Delete Cart</a></td>
			    		</tr>
			    	@endforeach
			    </tbody>
			</table>
		</div>
	</div>	


@endsection