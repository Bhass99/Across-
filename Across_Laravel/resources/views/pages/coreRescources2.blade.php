@extends('layout.app')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages.css')}}" />

@include('inc.navbar')
@section('content')
    <div class="PageInfoBar" >
        <div class="GrayBar"></div>
        <img class="GrayIcon" src="/images/grayicon.png">
        <div class="OneWord" >LOJUXTA</div>
        <div class="BlueBar" style="background-color:  rgb(	116, 55, 81);">
            <div class="blue_title">
                LEARNING RESOURCE
            </div>
            <div class="SecondLogo">
                <div>Core Rescources </div>
                <img src="/images/purple.png" >
            </div>
        </div>
    </div>
    <div class="container container-responsive">
        <p class="txtPageCore"> Core rescources / <a style="color: #743751;">Med info facts sheets</a></p>
        <div class="divsInfo">
            <div class="divBlock">
                <h2 class="">lorem ipsum</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque e
                </p>
            </div>

        </div>

        <div class=" d-block  row px-3 ">
            <p class="divsTxt">lorem ipsum</p>

            <a href="{{ url('/corerescources') }}"><div class=" row purple1 " style="background-color: #8f5e73;">
                    <div class="col">
                        <img src="/images/purple1.png" class="iconImgs" >
                    </div>
                    <div class="col">
                        <p class="iconTxt">MED INFO FACT SHEETS</p>
                    </div>
                </div></a>
            <a href="#"><div class=" row purple2 " style="background-color: #ebebeb;">
                    <div class="col">
                        <img src="/images/purple2.png" class="iconImgs">
                    </div>
                    <div class="col">
                        <p class="iconTxt">FAQs</p>
                        <p class="text-center divArrow2" > > </p>

                    </div>
                </div></a>
            <a><div class=" row purple3 orang ">
                    <div class="col">
                        <img src="/images/purple3.png" class="iconImgs">
                    </div>
                    <div class="col">
                        <p class="iconTxt">PATIENT MATERIALS</p>
                    </div>
                </div></a>
            <a><div class=" row purple4 ">
                    <div class="col">
                        <img src="/images/purple4.png" class="iconImgs">
                    </div>
                    <div class="col">
                        <p class="iconTxt">HCP Materials</p>
                    </div>
                </div></a>
            <a><div class=" row purple5 ">
                    <div class="col">
                        <img src="/images/purple5.png" class="iconImgs">
                    </div>
                    <div class="col">
                        <p class="iconTxt">MEETING RESOURCES</p>
                    </div>
                </div></a>
        </div>
    </div>
    <div class="container-fluid  ">
        <div class="container mr-desk">
            <div class="contentheader contentheaderCR">
                <img src="/images/info.png" class="infoimg">
                <h1>Lorem ipsum dolor sit amet,</h1>
            </div>
            <div class="content">
                <div class="content_txt content_txtCR">
                    <p class="mt-3">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
                    </p>
                    <button class="btn btn-light float-right btns1 btnsCR">&and;</button>
                </div>
            </div>
            <hr  class="content_hr content_hrCR">
        </div>
    @include('inc.Blocks')
@endsection