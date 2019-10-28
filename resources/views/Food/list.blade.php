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
			            <th>Price</th>
			            <th>Add Cart</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($data as $row)
			    		<tr>
			    			<td>{{ $row->name }}</td>
			    			<td>{{ $row->price }}</td>
			    			<td><a href="{{ url('/add_cart',$row->p_id) }}">Add Cart</a></td>
			    		</tr>
			    	@endforeach
			    </tbody>
			</table>
		</div>
	</div>	


@endsection