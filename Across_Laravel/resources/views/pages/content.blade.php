@extends('layout.app')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages.css')}}" />
@php
    $categoryid = \App\Category::whereNull('parent_id')->get();

@endphp
@include('inc.navbar')
@section('content')



    <div class="blueBarWidth">
        <div class="PageInfoBar">
            <div class="GrayBar "></div>
            <img class="GrayIcon" src="/images/grayicon.png" >
            <div class="OneWord" >LOJUXTA</div>
            @switch($category)
                @case($category[0]->id == $parent->id)
                    <div class="BlueBar w-100" style="background-color:  #005493;">
                @break
                @case($category[1]->id == $parent->id)
                    <div class="BlueBar w-100" style="background-color:  #743751;">
                @break
                @case($category[2]->id == $parent->id)
                    <div class="BlueBar w-100" style="background-color:  #ff9400;">
                @break
                @case($category[3]->id == $parent->id)
                    <div class="BlueBar w-100" style="background-color:  #bd5200;">
                @break
                @case($category[4]->id == $parent->id)
                    <div class="BlueBar w-100" style="background-color:  #929000;">
                @break
                @endswitch
                <div class="blue_title">
                    LEARNING RESOURCE
                </div>
                <div class="SecondLogo">
                    <div>
                        <p class="name-page">{{$parent->name}}</p>
                    </div>
                    <img src="/storage/uploads/{{$parent->category_logo}}" >
                </div>
            </div>
                </div></div></div></div>
        </div>
    </div>

        <div class="container container-responsive">
            <p class="txtPageCore"> {{$parent->name}}/ {{isset($id_category->name)? $id_category->name :'All' }}<a href="#" style="color: #7baabe;"></a></p>
            <div class="divsInfo">
                <div class="divBlock">
                    <h2 class="">{{$parent->title}}</h2>
                    <p>{{$parent->description}}</p>
                </div>
                <div class=" d-block  row px-3 ">
                    @php
                        $i=1;
                    @endphp
                    @foreach($children as $item)
                        <a href="/sub_category/{{$item->parent_id . '/'.$item->id}}" >
                            <div class=" row purple{{$i}} " style=" @if ( $id_category->id == $item->id) background: #ebebeb; @endif">
                                <div class="col">
                                    <img src="/storage/uploads/{{$item->category_logo}}" class="iconImgs" >
                                </div>
                                <div class="col">
                                    <p class="iconTxt">{{$item->name}}</p>

                                </div>
                                <p class="text-center divArrow" style=" @if ( $id_category->id == $item->id) display: block !important; @endif"  > > </p>
                            </div>
                        </a>
                        @php
                            $i++;
                        @endphp
                    @endforeach
            </div>

            </div>
        </div>
        @if($parent->name == "HoFH Libary")
            <div class="container" >
                <div class="mb-3">
                    <div class="form-group">
                        <label class="labelInput">Search Author</label>
                        <input type="text" placeholder="_" class="form-control inputAuthor" name="author">
                    </div>
                    <label class="labelTags">Content tags</label>

                    <div>
                        <div class="btnTagsFlex">
                            <button class="btn btn-primary btnTags">HoFH MANAGRMRNT</button>
                            <button class="btn btn-primary btnTags">GUIDLINES</button>
                            <button class="btn btn-primary btnTags">POSTER</button>
                        </div>
                        <div class="btnTagsFlex">
                            <button class="btn btn-primary btnTags">SAFETY TOLERABILITY</button>
                            <button class="btn btn-primary btnTags">APHERSIS</button>
                            <button class="btn btn-primary btnTags">CLINICAL TRIAL</button>
                        </div>
                        <div class="btnTagsFlex">
                            <button class="btn btn-primary btnTags">CASE STUDIES</button>
                            <button class="btn btn-primary btnTags">ACCESS</button>
                            <button class="btn btn-primary btnTags">PHASE 3</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @foreach($assets as $post)
            @if( $index)
                <div class="container-fluid  ">
                    <div class="container mr-desk">
                        <div class="contentheader">
                            <img src="/storage/uploads/{{$post->image}}" class="infoimg">
                            <h1> {{$post->title}} </h1>
                        </div>

                        <p> {{$post->description}}</p>
                        <hr  class="content_hr">
                    </div>

                </div>
            @else
                <div class="container-fluid  ">
            @if($categoryid[1]->id == $id)
                <div class="container mr-desk" style="background-color: {{ $post->type  == 'Not Important' ? '#ebebeb' : '#ff9400' }} ;">
            @else
                <div class="container mr-desk" style="background-color: {{ $post->type  == 'Not Important' ? '#ebebeb' : '#005493' }} ;">
            @endif
                <small class="smaldate {{ $post->type == 'Not Important' ? '' : 'text-white' }}"> {{ $post->date }} </small>
                <div class="contentheader">
                    <img src="/storage/uploads/{{$post->image}}"  class="infoimg">
                    <h1 class=" {{ $post->type == 'Not Important' ? '' : 'text-white' }}"> {{ $post->type == 'Not Important' ? '' : 'HIGHLIGHT:' }}  {{ $post->title  }}</h1>
                </div>
                <div class="content">
                    <div class="content_imgs mt-3" >
                        <svg width="100" height="400" class="bluerect">

                            @if($categoryid[0]->id == $parent->id)
                                <rect width="100" height="358"  style="fill: {{ $post->type  == 'Not Important' ? 'rgb(0, 84, 147)' : '#ff9400' }} " />
                            @elseif($categoryid[1]->id == $parent->id)
                                <rect width="100" height="358"  style="fill: {{ $post->type  == 'Not Important' ? 'rgb(	116, 55, 81)' : 'rgb(	116, 55, 81)'}} " />
                            @elseif($categoryid[2]->id == $parent->id)
                                <rect width="100" height="358"  style="fill: #ff9400" />
                            @elseif($categoryid[3]->id == $parent->id)
                                <rect width="100" height="358"  style="fill: #bd5200" />
                            @elseif($categoryid[4]->id == $parent->id)
                                <rect width="100" height="358"  style="fill:#929000 " />
                            @endif
                        </svg>
                        @if($categoryid[4]->id == $id)
                            <video  class="video" controls>
                                <source src="/storage/uploads/{{ $post->file }}"  type="video/mp4">
                                <source src="/storage/uploads/{{ $post->file }}"  type="video/webm">
                                <source src="/storage/uploads/{{ $post->file }}"  type="video/mov">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="/storage/uploads/{{ $post->file }}" class="content_img" >
                        @endif
                    </div>
                    <div class="content_txt">
                        <p class="mt-3 body-txt {{ $post->type == 'Not Important' ? '' : 'text-white' }}" >
                            {{ $post->description }}

                        </p>
                        <ul>
                            @if(isset($post->first_li))
                                <li class="{{ $post->type == 'Not Important' ? '' : 'text-white' }}"><span class="dot"></span>{{ $post->first_li }}</li>
                            @endif
                            @if(isset($post->second_li))
                                <li class="{{ $post->type == 'Not Important' ? '' : 'text-white' }}"><span class="dot"></span>{{ $post->second_li }}</li>
                            @endif
                        </ul>
                        <div class="buttons-div">
                            @if($categoryid[1]->id == $id)
                                <a href="{{ route('download', $post->id) }}" target="_blank"  class="btn btn-primary float-left btns btnD {{ $post->type  == 'Important' ? '' : 'rgb(	116, 55, 81)' }}" >Download</a>
                                <button class=" btn btn-light float-left btns btnI"> > </button>
                            @elseif($categoryid[4]->id == $id)
                                <a href="#"  class="btn float-left btns btnD" style="background-color: white !important;" >Open</a>
                                <a class="btn float-leftbtns btns btnI" style="background-color: #49b9e5"> > </a>
                            @else
                                <a href="/download/{{$post->id}}"  class="btn btn-primary float-left btns btnD" target="_blank" style="background-color:{{ $post->type  == 'Not Important' ? '' : '#ff9400' }}">Download</a>
                                <button class=" btn btn-light float-left btns btnI"> > </button>
                            @endif

                            <div class="language">
                                @if(isset($post->language))

                                @endif

                            </div>

                            <button class="btn btn-light float-right btns1" onclick="topFunction()">&and;</button>
                        </div>
                    </div>
                </div>
                @if($categoryid[1]->id == $id)
                    <hr  class="content_hr" style="background-color: {{ $post->type  == 'Important' ? '' : '#ff9400' }};">
                @else
                    <hr  class="content_hr" style="background-color: {{ $post->type  == 'Not Important' ? '' : '#005493' }};">
                @endif
            </div>
        </div>
    </div>
@endif
@endforeach

@include('inc.Blocks')
<script>

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    $(".body-txt").each(function () {

        var $height = 134;
        if ($(this).height() > $height ){
            $(this).css("height", 135);
            $(this).css("overflow-y", "scroll");


        }else {
            console.log($(this).height());
            $(this).css("height", "auto");
        }
    });
    $("#link1").css("font-weight", "bold");

</script>

@endsection