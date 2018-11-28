@extends('layout.app')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages.css')}}" />
@include('inc/navbar')
@section('content')

    <div class="PageInfoBar" >
        <div class="GrayBar"></div>
        <img class="GrayIcon" src="/images/grayicon.png">
        <div class="OneWord" >LOJUXTA</div>
        <div class="BlueBar" style="background: #929000;" >
            <div class="blue_title">
                LEARNING RESOURCE
            </div>
            <div class="SecondLogo">
                <div>Objection Handlers</div>
                <img src="/images/newslogo.png" >
            </div>
        </div>
    </div>
        <div class="container">
            <p class="txt1"> Objection handlers / <a style="color: dodgerblue">all</a></p>
            <h1>Lorem ipsum</h1><br>
            <p>                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
            </p>
        </div>

    <div class="container-fluid  ">
        @foreach($posts as $item)
            @if($item->page_name == 'objection')
        <div class="container">
            <small class="smaldate">{{$item->date}}</small>
            <div class="contentheader">
                <img src="images/info.png" class="infoimg">
                <h1>{{$item->title}}</h1>
            </div>
            <div class="content">
                <div class="content_imgs mt-3" >
                    <svg width="100" height="400" class="bluerect" style="    margin-top: -260px;">
                        <rect width="100" height="358"  style="fill: #929000;" />
                    </svg>
                    <video class="content_img" controls>
                    </video>
                </div>
                <div class="content_txt">
                    <p class="mt-3">
                        {{$item->description}}
                    </p>
                    <ul>
                        @if($item->first_li)
                            <li><span class="dot"></span>{{$item->first_li}}</li>
                        @endif
                        @if($item->second_li)
                            <li><span class="dot"></span>{{$item->second_li}}</li>
                        @endif
                    </ul>
                    <button class="  btn  float-left btns btn-light " >Open</button>
                    <button class=" btn  float-left btns btn-info "> > </button>

                    <button class=" secondBtn btn  float-left btns   btn-light">Save link</button>
                    <button class="  btn  float-left btns btn-info " > > </button>

                    <button class="btn btn-light float-right btns1" style="width: 10px">&and;</button>
                </div>
            </div>
            <hr  class="content_hr">
        </div>
            @endif
        @endforeach

    </div>
@include('inc.Blocks')
    <script>
        $("#link1").css("font-weight", "bold")
    </script>
@endsection