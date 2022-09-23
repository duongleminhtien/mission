@extends('master-header::welcome')
@section('content')
    <!-- <h2>List users</h2>
    <a href="{{route('user.create.get')}}">Create new user</a> <hr>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
        @foreach($list as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="user-edit/{{ $user->id }}">Update</a> <br> 
                    <a href="delete/{{ $user->id }}">Delete</a>
                <td>
            </tr>
        @endforeach -->

        <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">22-D</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Basic</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List users</h4>
                                    <a href="{{route('user.create.get')}}">Create new user</a> <hr>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title">Basic example</h4>
                                    <p class="sub-header">
                                        For basic styling—light padding and only horizontal dividers—add the base class <code>.table</code> to any <code>&lt;table&gt;</code>.
                                    </p>
        
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($list as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <a href="user-edit/{{ $user->id }}">Update</a> <br> 
                                                        <a href="delete/{{ $user->id }}">Delete</a>
                                                    <td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
        
                        </div>
                        <!--- end row -->        
                        
                    </div>
@endsection