
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
        <form class="LoginForm" method="POST" action="/posts/{{$posts->id}}" enctype="multipart/form-data" >
            {{ csrf_field() }}
            {{method_field('PATCH')}}
            <input type="hidden" name="post_parent_id" value="{{$posts->post_parent_id}}">
            <label>Title</label>
            <input class="form-control" type="text" name="title" value="{{$posts->title}}"   >
            <br>
            <label>Post type</label>
            <select name="type" class="form-control" required>
                <option value="{{ $posts->type }}">{{ $posts->type }}</option>
                <option value="Important" >Important</option>
                <option value="Not Important" >Not Important</option>
            </select>
            <br>
            <label>Description</label>
            <textarea class="form-control" type="text" name="description" >{{$posts->description}}</textarea>
            <br>
            <label>First list item</label>
            <input class="form-control" type="text" name="first_li" value="{{$posts->first_li}}" >
            <br>
            <label>Second list item</label>
            <input class="form-control" type="text" name="second_li" value="{{$posts->second_li}}" >
            <br>
            <label>Date</label>
            <input class="form-control" type="date" name="date" value="{{$posts->date}}">
            <br>
            <label>File</label>
            <input class="form-control" type="file" name="file" value="{{$posts->file}}">
            <br>
            <label>Image</label>
            <input class="form-control" type="file" name="image" value="{{$posts->image}}">
            <br>
            <label>Language</label>
            <select name="language" class="form-control" required>
                <option value="{{$posts->language}}">{{$posts->language}}</option>
                <option value="german" >German</option>
                <option value="italian" >Italian</option>
                <option value="spanish" >Spanish</option>
                <option value="english" >English</option>
            </select>
            <br>

            <div class="loginSubmit w-25    ">
                <input class="btn btn-primary float-left btns btnD " name="submit" type="submit" value="Submit" ><button class=" btn btn-light float-left btns btnI" name="submit" type="submit"> > </button>
            </div>
            <a href="{{ route('adminpages') }}" class="float-right  btn btn-light">Back</a>
        </form>
        <img src="/images/body.png" class="bg-image">

@endsection