@extends("blade_lect_1_parent")


@section('title', $title)	
 
@section("nav-bar")
	

	<p>Child Nav bar </p>
	<!-- IT will parent section is here -->
	@parent

@endsection


@section("content")
		
		@component("alert")
            <strong>Good!</strong>
        	<hr/>
        	<p>Very Dangerous</p>

        	@slot("title")
                <h2>Forbidden</h2> 
            @endslot

    	@endcomponent

		<p>Child Body Content</p>

@endsection
