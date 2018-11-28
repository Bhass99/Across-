@extends('layout.app')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages.css')}}" />

@include('inc.navbar')
@section('content')
    <div class="PageInfoBar" >
        <div class="GrayBar"></div>
        <img class="GrayIcon" src="/images/grayicon.png">
        <div class="OneWord" >LOJUXTA</div>
        <div class="BlueBar">
            <div class="blue_title">
                LEARNING RESOURCE
            </div>
            <div class="SecondLogo">
                <div>News and Updates</div>
                <img src="/images/newslogo.png" >
            </div>
        </div>
    </div>

    <div class="container container-responsive">
        <p class="txtPageCore">{{$one_category->name}}/ <a style="color: #743751;">all</a></p>
    </div>
        <div class="container container-responsive">
            <div class="divsInfo">
                <div class="divBlock">
                    <h2 class="">{{$one_category->title}}</h2>
                    <p>{{$one_category->description}}</p>
                </div>
             </div>
        </div>
    <!--    <div class="container-fluid  ">

            @foreach($posts as $item)
            @if($item->page_name == 'news')
                @if($item->type == "Not Important")
                <div class="container mr-desk">
                @else
                <div class="container mr-desk " style="background: #1b4b72">
                @endif
                    <small class="smaldate">{{$item->date}}</small>
                    <div class="contentheader">
                        <img src="{{$item->image}}" class="infoimg">
                        <h1>{{$item->title}}</h1>
                    </div>

                    <div class="content">


                        <div class="content_imgs mt-3" >
                            <svg width="100" height="400" class="bluerect">
                                <rect width="100" height="358"  style="fill: rgb(0, 84, 147);" />
                            </svg>
                            <img src=" {{$item->file}}" class="content_img" >
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
            @endforeach -->
        </div>

    @include('inc.Blocks')

@endsection