
@extends('layout.loginlayout')
<link rel="stylesheet/less" type="text/css" href="{{asset('css/login.css')}}" />

@section('content')
    <div class="loginContainer">
        <div class="header"> <img src="/images/logo.png" > </div>
        <div class="PageInfoBar">
            <img class="GrayIcon" src="/images/blueicone.png">
            <p class="OneWord">LOJUXTA</p>
            <div class="BlueBar" style="background: #49b9e5; width: 100%">
                <div class="blue_title"><p>LEARNING RESOURCE</p></div>
            </div>

        </div>
        <p class="LoginPara">parturient montes, nascetur ridiculus mus.. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam</p>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <br>
                <div class="alert alert-warning">
                    <li> {{ $error  }}</li>
                </div>
            @endforeach
        @endif
        @if($user)
            <form method="POST" action="{{ route('users.update', $user->id) }}" class="LoginForm">
                <input type="hidden" name="_method" value="PATCH">

                @else
                    <form method="POST" action="{{ route('users.store') }}" class="LoginForm">
                        @endif
                        {{ csrf_field() }}
                        <p class="loginTitle">
                            @if($user)
                              Edit
                                @else
                                Add a new user
                            @endif
                        </p>
                        <div class="form-group">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $user ? $user->first_name : null) }}" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $user ? $user->last_name : null) }}" placeholder="Last Name" required>
                            </div>
                            <label> Choose a role</label>
                            <select name="role" class="form-control" required>
                                <option value="">Choose a role</option>
                                <option value="admin" >Admin</option>
                                <option value="user" >User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email adres</label>
                            <input type="text" name="email"  class="form-control" value="{{ old('email', $user ? $user->email : null) }}" placeholder="Email" required>
                        </div>
                        <div class="loginSubmit w-25    ">
                            <input class="btn btn-primary float-left btns btnD " name="submit" type="submit" value="Submit" ><button class=" btn btn-light float-left btns btnI" name="submit" type="submit"> > </button>
                        </div>
                        <a href="/adminusers" class="float-right  btn btn-light">Back</a>
                    </form>
            </form>
    </div>
    <img src="/images/body.png" class="bg-image">

@endsection