@extends('../Layouts/layout')

@section("slider")
@endsection

@section("body-content")
		
	<div class="container">
		
		{{-- $data->links() --}}

		<div class="row">
			<table class="table table-hover">
			    <thead>
			        <tr>
			            <th>Name</th>
			            <th>Email</th>
			            <th>Username</th>
			            <th>Edit</th>
			            <th>Delete</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($data as $row)
			    		<tr >
				            <td>{{ $row->name }}</td>
				            <td>{{ $row->email }}</td>
				            <td>{{ $row->username }}</td>
				            <td><button type="button"><a href="{{ url('register_user',$row->id) }}">Edit</a></button></td>
				            <td><button type="button"><a href="{{ url('delete',$row->id) }}">Delete</a></button></td>
			        </tr>

			    	@endforeach
			        
			    </tbody>
			</table>
		</div>
		{{-- $data->links() --}}
	</div>	


@endsection