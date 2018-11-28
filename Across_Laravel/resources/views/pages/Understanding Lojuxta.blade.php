@extends('layout.app')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages.css')}}" />
@include('inc.navbar')
@section('content')
    <div class="PageInfoBar" >
        <div class="GrayBar"></div>
        <img class="GrayIcon" src="/images/grayicon.png">
        <div class="OneWord" >LOJUXTA</div>
        <div class="BlueBar" style="background-color: #ff9400">
            <div class="blue_title">
                LEARNING RESOURCE
            </div>
            <div class="SecondLogo">
                <div>Core Rescources</div>
                <img src="/images/purple.png" >
            </div>
        </div>
    </div>
    <div class="container container-responsive">
        <p class="txtPageCore"> Understanding LOJUXTA / <a style="color: #ffc107;">Clinical data</a></p>
        <div class="divsInfo">
            <div class="divBlock">
                <h2 class="">lorem ipsum</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque e
                </p>
            </div>

        </div>

        <div class=" d-block  row px-3 ">
            @foreach($category as $item)
                @if($item->parent_id == $one_category->id)
                    <a href="#"><div class=" row purple1 ">
                            <div class="col">
                                <img src="images/purple1.png" class="iconImgs" >
                            </div>
                            <div class="col">
                                <p class="iconTxt">{{$item->name}}</p>
                                <p class="text-center divArrow" > > </p>
                            </div>
                        </div></a>
                @endif
            @endforeach
        </div>
    </div>
<div class="container-fluid  ">
    @foreach($posts as $item)
        @if($item->page_name == 'understanding')
            <div class="container mr-desk">
                <small class="smaldate">{{$item->date}}</small>
                <div class="contentheader">
                    <img src="images/info.png" class="infoimg">
                    <h1>{{$item->title}}</h1>
                </div>
                <div class="content">
                    <div class="content_imgs mt-3" >
                        <svg width="100" height="400" class="bluerect">
                            <rect width="100" height="358"    style="fill: #ff9400;" />
                        </svg>
                        <img src=" {{$item->image}}" class="content_img" >
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
                        <button class="btn btn-primary float-left btns btnD">Download</button>
                        <button class=" btn btn-light float-left btns btnI"> > </button>
                        <button class="btn btn-light float-right btns1">&and;</button>
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