@extends('layout.app')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages.css')}}" />

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

        @foreach($assets as $item)
            @if( $index)
                <div class="container-fluid  ">
                    <div class="container mr-desk">
                        <div class="contentheader">
                            <img src="/storage/uploads/{{$item->image}}" class="infoimg">
                            <h1> {{$item->title}} </h1>
                        </div>

                       <p> {{$item->description}}</p>
                        <hr  class="content_hr">
                    </div>

                </div>
            @else
                <div class="container-fluid  ">
                @if($item->type == "Not Important")
                    <div class="container mr-desk">
                        @else
                            <div class="container mr-desk " style="background: #1b4b72; color: white">
                                @endif
                                <small class="smaldate">{{$item->date}}</small>
                                <div class="contentheader">
                                    <img src="/storage/uploads/{{$item->image}}" class="infoimg">
                                    <h1>{{$item->title}}</h1>
                                </div>

                                <div class="content">


                                    <div class="content_imgs mt-3" >
                                        <svg width="100" height="400" class="bluerect">
                                            @if($item->type == "Not Important")
                                              <rect width="100" height="358"  style="fill: rgb(0, 84, 147);" />
                                            @else
                                                <rect width="100" height="358"  style="fill: rgb(255,177,0);" />
                                            @endif
                                        </svg>
                                        <img src="/storage/uploads/{{$item->file}}" class="content_img" >
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
                                        @if($item->type == "Not Important")
                                            <a href="/download/{{$item->id}}"  > <button class="btn btn-primary float-left btns btnD"  >Download</button></a>
                                        @else
                                            <button class="btn btn-primary float-left btns btnD" style="background:  rgb(255,177,0)">Download</button>
                                        @endif
                                        <button class=" btn btn-light float-left btns btnI"> > </button>
                                        <button class="btn btn-light float-right btns1">&and;</button>
                                    </div>
                                </div>

                                <hr  class="content_hr">
                            </div>
                    </div>
                </div>
    @endif
    @endforeach


    @include('inc.Blocks')
    <script>
        $("#link1").css("font-weight", "bold")
    </script>

@endsection