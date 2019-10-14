@extends('../Layouts/layout')

@section("slider")
@endsection

@section("body-content")
		
	<div class="container">
		
		{{ $data->links() }}

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
			    	@each("Food.tr",$data,"row","../empty")
			    </tbody>
			</table>
		</div>
		{{ $data->links() }}
	</div>	


@endsection