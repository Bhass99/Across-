
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

           <div class="highlight_check_div">
               <label class="checkBox-label">Highlight</label>
               <input type="checkbox" name="is_highlighted"  class="check_box"   value="1" {{$posts->is_highlighted ? 'checked':''}}>
           </div>



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
            <label>Image</label>
            <input class="form-control" type="file" name="image" value="{{$posts->image}}">
            <br>
            <div class="oldFilesSpace"  id="oldFilesSpace">

            </div>
            <br>
            <label>Language</label>
            <div class="check_box_container">
                <div class="check_box_div" id="nl">
                    <label> Dutch </label>
                    <input class="CheckBox" type="checkbox" name="nl"  value="nl"   >
                </div>

                <div class="check_box_div" id="de">
                    <label> German</label>
                    <input class="CheckBox" type="checkbox" name="de"  value="de"  >
                </div>

                <div class="check_box_div" id="it">
                    <label>  Italian</label>
                    <input class="CheckBox" type="checkbox" name="it"  value="it"  >
                </div>

                <div class="check_box_div"  id="es">
                    <label>  Spanish</label>
                    <input class="CheckBox" type="checkbox" name="es"  value="es"  >
                </div>

                <div class="check_box_div" id="en">
                    <label>English</label>
                    <input class="CheckBox" type="checkbox" name="en"  value="en"  >
                </div>
            </div>


            <br>
            <br>

            <div class="loginSubmit w-25    ">
                <button  class="btn btn-primary float-left btns btnD " name="submit" type="submit" value="Submit" > Submit <span  > > </span> </button>
            </div>
            <a href="{{ route('adminpages') }}" class="float-right  btn btn-light">Back</a>
        </form>
        <div id="oldFiles" class="oldFiles">
            @foreach($file as $TheFile)
                <div class="one_file">
                    <div class="FileName" >{{$TheFile->language . '.' . $TheFile->file  }}</div>
                    <form method="POST" action="/files/{{$TheFile->id}} " onsubmit="return confirm('Are you sure you want to delete this file?')">
                        {{method_field('delete')}}
                        {!! csrf_field() !!}
                        <button type="submit" style="border: none; background: none; cursor: pointer" ><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            @endforeach
        </div>
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
                        ($(this).parent().children()[2]).remove();
                        console.log();
                    }
                })

            });

            var parent = document.getElementById('oldFilesSpace')
            var child = document.getElementById('oldFiles')
                parent.appendChild(child);

        </script>
@endsection