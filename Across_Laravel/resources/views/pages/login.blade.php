@extends('layout.loginlayout')
<link rel="stylesheet/less" type="text/css" href="{{asset('css/login.css')}}" />

@section('content')
<div class="loginContainer">
    <div class="header"> <img src="images/logo.png" > </div>
    <div class="PageInfoBar">
        <img class="GrayIcon" src="images/blueicone.png">
        <p class="OneWord">LOJUXTA</p>
        <div class="BlueBar" style="background: #49b9e5; width: 100%">
            <div class="blue_title"><p>LEARNING RESOURCE</p></div>
        </div>

    </div>
    <p class="LoginPara">parturient montes, nascetur ridiculus mus.. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam</p>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <br>
            <div class="alert alert-danger">
                <li> {{ $error  }}</li>

            </div>
        @endforeach
    @endif
    <form method="POST"  action="/login" class="loginForm">
        {{ csrf_field() }}
        <p class="loginTitle">LOGIN</p>
        <div class="form-group">
            <label> Email adres</label>
            <input type="text" name="email" class="form-control" required placeholder="Email" >
        </div>
        <div class="form-group">
            <label> Password</label>
            <input type="password" name="password"  class="form-control" required placeholder="Password" >
        </div>
        <div class="loginSubmit">
            <button  class="btn btn-primary float-left btns btnD " name="submit" type="submit" value="Submit" > Submit <span  > > </span> </button>
            <a href="{{ url('forgetPassword') }}">Forgotten Password?</a>
        </div>

    </form>
</div>
<img src="images/body.png" class="bg-image">

@endsection