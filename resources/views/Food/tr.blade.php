<tr>
    <td>{{ $row->name }}</td>
    <td>{{ $row->email }}</td>
    <td>{{ $row->username }}</td>
    <td>
    	<button type="button">
    		<a href="{{ url('register_user',$row->id) }}">Edit</a>
    	</button>
    </td>
    <td>
    	<button type="button">
    		<a href="{{ url('delete',$row->id) }}">Delete</a>
    	</button>
    </td>
</tr>
