
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
        <br>
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li> {{ $error  }}</li>
                @endforeach
            </ul>
        @endif
        <form class="LoginForm" method="POST" action= "/posts" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <br>
            <input type="hidden" name="post_parent_id" value="{{$PageId}}">
            <br>
            <label>Question</label>
            <input class="form-control" type="text" name="title" >
            <br>
            <label>Answer</label>
            <textarea class="form-control" type="text" name="description" ></textarea>
            <br>
            <label>Image</label>
            <input class="form-control" type="file" name="image" >
            <br>
            <div class="loginSubmit w-25    ">
                <input class="btn btn-primary float-left btns btnD " name="submit" type="submit" value="Submit" ><button class=" btn btn-light float-left btns btnI" name="submit" type="submit"> > </button>
            </div>
            <a href="{{ route('users.index') }}" class="float-right  btn btn-light">Back</a>
        </form>


        <img src="/images/body.png" class="bg-image">
@endsection