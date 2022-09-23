@extends('master-header::welcome')
@section('content')
    <!-- <h2>Edit user</h2>
    <form action="user-edit/{{ $user->id }}" method="post">
        @csrf
        <label for="Name">
            Name:
            <input type="text" name="name" value="{{ $user->name }}">
        </label><br><br>
        <label for="Email">
            Email:
            <input type="text" name="email" value="{{ $user->email }}">
        </label><br><br>
        <label for="Password">
            Password:
            <input type="text" name="password" >
        </label><br><br>
        <button type="submit">Edit user</button>
    </form> -->
    
    <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">22-D</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Elements</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Edit user</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Input Types</h4>
                                        <p class="sub-header">
                                            Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                                        </p>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form>

                                                    <div class="form-group mb-3">
                                                        <label for="simpleinput">Name</label>
                                                        <input type="text" name="name"  class="form-control" 
                                                        value="{{ $user->name }}">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-email">Email</label>
                                                        <input type="email"  name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-password">Password</label>
                                                        <input type="password" name="password" class="form-control" value="password">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="password">Show/Hide Password</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="password" id="password" class="form-control" placeholder="Enter your password">
                                                            <div class="input-group-append" data-password="false">
                                                                <div class="input-group-text">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit">Edit user</button>
                                                   
                        </form>
                                           
                                       

@endsection