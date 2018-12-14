
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
        <form class="LoginForm" method="POST" action="/secondcategory/{{$category->id}}" enctype="multipart/form-data" >
            {{ csrf_field() }}
            {{method_field('PATCH')}}
            <br>
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{$category->name}}" >
            <br>
            <label>Image</label>
            <input class="form-control" type="file" name="category_logo" value="{{$category->image}}">
            <br>
            <div class="loginSubmit w-25">
                <button  class="btn btn-primary float-left btns btnD " name="submit" type="submit" value="Submit" > Submit <span  > > </span> </button>
            </div>
            <a href="{{ route('adminpages') }}" class="float-right  btn btn-light">Back</a>
        </form>
        <img src="/images/body.png" class="bg-image">

@endsection