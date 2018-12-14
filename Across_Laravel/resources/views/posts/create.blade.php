
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
            <label>Title</label>
            <input class="form-control" type="text" name="title" value="{{old('title')}}">
            <br>
            <label>Highlight</label>
            <input type="checkbox" name="is_highlighted"  class="form-control"   value="1">
            <br>
            <label>Description</label>
            <textarea class="form-control" type="text" name="description" >{{old('description')}}</textarea>
            <br>
            <label>First list item</label>
            <input class="form-control" type="text" name="first_li" value="{{old('first_li')}}" >
            <br>
            <label>Second list item</label>
            <input class="form-control" type="text" name="second_li" value="{{old('second_li')}}" >
            <br>
            <label>Date</label>
            <input class="form-control" type="date" name="date" value="{{old('date')}}" >
            <br>
            <label>Image</label>
            <input class="form-control" type="file" name="image"  value="{{old('image')}}">
            <br>

            <label>Language</label>
            <label id="nl">
                Nl
                <input class="CheckBox" type="checkbox" name="nl"  value="nl"   >
            </label>

            <label id="de">
                GM
                <input class="CheckBox" type="checkbox" name="de"  value="de"  >
            </label>

            <label id="it">
                IT
                <input class="CheckBox" type="checkbox" name="it"  value="it"  >
            </label>

            <label id="es">
                SP
                <input class="CheckBox" type="checkbox" name="es"  value="es"  >
            </label>

            <label id="en">
                EN
                <input class="CheckBox" type="checkbox" name="en"  value="en"  >
            </label>

            <br>
            <br>

            <div class="loginSubmit w-25    ">
                <button  class="btn btn-primary float-left btns btnD " name="submit" type="submit" value="Submit" > Submit <span  > > </span> </button>
            </div>
            <a href="{{ route('adminpages') }}" class="float-right  btn btn-light">Back</a>
        </form>


    <img src="/images/body.png" class="bg-image">



        <script>

          $(document).ready(function () {

              $('.CheckBox').change(function () {
                  if ($(this).is(":checked")) {
                       x = document.createElement("INPUT");
                      x.setAttribute("type", "file");
                      x.setAttribute("name", "file-" + $(this).val());
                      document.getElementById($(this).parent().attr('id')).appendChild(x);
                  } else {
                        ($(this).parent().children()[1]).remove();
                      console.log();
                  }
              })

          });

        </script>


@endsection