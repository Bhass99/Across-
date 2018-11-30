@extends('layout.app')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages.css')}}" />
@php
    $categoryid = \App\Category::whereNull('parent_id')->get();

@endphp
@include('inc.navbar')
@section('content')
    <div class="PageInfoBar" >
        <div class="GrayBar"></div>
        <img class="GrayIcon" src="/images/grayicon.png" >
        <div class="OneWord" >LOJUXTA</div>


        @switch($category)
           @case($category[0]->id == $parent->id)
            <div class="BlueBar" style="background-color:  #005493;">
            @break

            @case($category[1]->id == $parent->id)
                <div class="BlueBar" style="background-color:  #743751;">
            @break

            @case($category[2]->id == $parent->id)
                <div class="BlueBar" style="background-color:  #ff9400;">
            @break

            @case($category[3]->id == $parent->id)
                <div class="BlueBar" style="background-color:  #bd5200;">
            @break

            @case($category[4]->id == $parent->id)
                <div class="BlueBar" style="background-color:  #929000;">
            @break

        @endswitch
            <div class="blue_title">
                LEARNING RESOURCE
            </div>
            <div class="SecondLogo">
                <div>{{$parent->name}}</div>
                <img src="/storage/uploads/{{$parent->category_logo}}" >
            </div>
        </div>
    </div>
    <div class="container container-responsive">

        <p class="txtPageCore"> {{$parent->name}}/ <a style="color: #743751;"></a></p>
        <div class="divsInfo">
            <div class="divBlock">
                <h2 class="">{{$parent->title}}</h2>
                <p>{{$parent->description}}</p>
            </div>
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
                        <p class="text-center divArrow" style=" @if ( $id_category->id == $item->id) display: block; @endif"  > > </p>
                    </div>

                </a>

                @php
                    $i++;
                @endphp
            @endforeach

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
                        <div class="container mr-desk" style="background-color: {{ $post->type  == 'Important' ? '#ebebeb' : '#ff9400' }} ;">
                            @else
                                <div class="container mr-desk" style="background-color: {{ $post->type  == 'Important' ? '#ebebeb' : '#005493' }} ;">
                                    @endif
                                    <small class="smaldate {{ $post->type == 'Important' ? '' : 'text-white' }}"> {{ $post->date }} </small>
                                    <div class="contentheader">
                                        <img src="/storage/uploads/{{$post->info_image}}"  class="infoimg">
                                        <h1 class=" {{ $post->type == 'Important' ? '' : 'text-white' }}">{{ $post->title  }}</h1>
                                    </div>
                                    <div class="content">
                                        <div class="content_imgs mt-3" >
                                            <svg width="100" height="400" class="bluerect">
                                                @if($categoryid[0]->id == $id)
                                                    <rect width="100" height="358"  style="fill: {{ $post->type  == 'Important' ? 'rgb(0, 84, 147)' : '#ff9400' }} " />
                                                @elseif($categoryid[1]->id == $id)
                                                    <rect width="100" height="358"  style="fill: {{ $post->type  == 'Important' ? 'rgb(	116, 55, 81)' : 'rgb(	116, 55, 81)'}} " />
                                                @elseif($categoryid[2]->id == $id)
                                                    <rect width="100" height="358"  style="fill: #ff9400" />
                                                @elseif($categoryid[3]->id == $id)
                                                    <rect width="100" height="358"  style="fill: #bd5200" />
                                                @elseif($categoryid[4]->id == $id)
                                                    <rect width="100" height="358"  style="fill:#929000 " />
                                                @endif
                                            </svg>
                                            @if($categoryid[4]->id == $id)
                                                <video  class="video" controls>
                                                    <source src="/storage/uploads/{{ $post->image }}"  type="video/mp4">
                                                    <source src="/storage/uploads/{{ $post->image }}"  type="video/webm">
                                                    <source src="/storage/uploads/{{ $post->image }}"  type="video/mov">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <img src="/storage/uploads/{{ $post->image }}" class="content_img" >
                                            @endif
                                        </div>
                                        <div class="content_txt">
                                            <p class="mt-3 {{ $post->type == 'Important' ? '' : 'text-white' }}" >
                                                {{ $post->content }}

                                            </p>
                                            <ul>
                                                @if(count($post->first_li) > 0)
                                                    <li class="{{ $post->type == 'Important' ? '' : 'text-white' }}"><span class="dot"></span>{{ $post->first_li }}</li>
                                                @endif
                                                @if(count($post->second_li) > 0)
                                                    <li class="{{ $post->type == 'Important' ? '' : 'text-white' }}"><span class="dot"></span>{{ $post->second_li }}</li>
                                                @endif
                                            </ul>
                                            <div class="buttons-div">
                                                @if($categoryid[1]->id == $id)
                                                    <a href="{{ route('download', $post->id) }}"  class="btn btn-primary float-left btns btnD" style="background-color:{{ $post->type  == 'Important' ? '' : 'rgb(	116, 55, 81)' }}">Download</a>
                                                    <button class=" btn btn-light float-left btns btnI"> > </button>

                                                @elseif($categoryid[4]->id == $id)
                                                    <a href="#"  class="btn float-left btn-light btn-obj">Open</a>
                                                    <button class=" btn float-left btna-obj" style="background-color: #49b9e5"> > </button>
                                                @else
                                                    <a href="/download/{{$post->id}}"  class="btn btn-primary float-left btns btnD" style="background-color:{{ $post->type  == 'Important' ? '' : '#ff9400' }}">Download</a>
                                                    <button class=" btn btn-light float-left btns btnI"> > </button>
                                                @endif

                                                @if($categoryid[4]->id == $id)
                                                    <a href="#"  class="btn float-left btn-light btn-obj btn-obj-save">Save</a>
                                                    <button class=" btn float-left  btna-obj" style="background-color: #49b9e5"> > </button>
                                                @endif
                                                <button class="btn btn-light float-right btns1">&and;</button>
                                            </div>

                                        </div>
                                    </div>
                                    @if($categoryid[1]->id == $id)
                                        <hr  class="content_hr" style="background-color: {{ $post->type  == 'Important' ? '' : '#ff9400' }};">
                                    @else
                                        <hr  class="content_hr" style="background-color: {{ $post->type  == 'Important' ? '' : '#005493' }};">
                                    @endif
                                </div>
                        </div>
                </div>

    @endif
    @endforeach


    @include('inc.Blocks')
    <script>

        $(".body-txt").each(function () {

            var $height = 134;
            if ($(this).height() > $height ){
                $(this).css("height", 135);

            }else {
                console.log($(this).height());
                $(this).css("height", "auto");
            }
        });
        $("#link1").css("font-weight", "bold");

    </script>

@endsection