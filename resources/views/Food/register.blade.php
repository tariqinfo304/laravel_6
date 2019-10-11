@extends('../Layouts/layout')

@section("slider")
@endsection


@section("body-content")

<div class="container">


 {{-- @php echo "<pre>"; print_r($errors); @endphp --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ url('register_save') }}" role="form">
    	@csrf()
        <h2>Registration</h2>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
                <input value="{{ $user_data->name }}" name="name" type="text" id="Name" placeholder="Name" class="form-control" autofocus>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Username</label>
            <div class="col-sm-9">
                <input value="{{ $user_data->username }}" name="username" type="text" id="username" placeholder="Username" class="form-control" autofocus>
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email* </label>
            <div class="col-sm-9">
                <input value="{{ $user_data->email }}" type="text" name="email"  id="email" placeholder="Email" class="form-control" name= "email">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password*</label>
            <div class="col-sm-9">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <span class="help-block">*Required fields</span>
            </div>
        </div>

        <!--
        <div class="form-group">
            <div class="col-sm-6">
                <input type="file" name="file_attach"/>
            </div>
        </div>
    -->
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
</div>
<hr/>

@endsection