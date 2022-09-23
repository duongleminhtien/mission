@extends('master-header::welcome')
@section('content')
<div class="container">
			<div class="row">
					<div class="col-sm-4">
                        <h2>Create user</h2>
                        <form action="{{route('user.create.post')}}" method="post">
                        {{csrf_field()}}
                            @csrf
                            <label for="Name">
                                Name:
                                <input type="text" name="name" id="fullname">
                            </label><br><br>
                            <label for="Email">
                                Email:
                                <input type="text" name="email" id="emailaddress">
                            </label><br><br>
                            <label for="Password">
                                Password:
                                <input type="text" name="password" id="password">
                            </label><br><br>
                            <button type="submit">Create user</button>
                        </form>
                    </div>
            </div>
</div>   

@endsection