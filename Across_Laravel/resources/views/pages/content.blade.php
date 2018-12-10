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
            <div class="BlueBar w-100 BlueBarCategory--{{ $parent->id }} " >
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


     @if(isset($index) && $index == 1)
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

    @if( isset($faqs) && $faqs == 1)
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


    <div class="container-fluid  category--{{ $parent->id }} ">
        {{--  @if($parent->id == $id) --}}
        <div class="container mr-desk  {{ $post->is_highlighted ? 'highlighted' : '' }}">
            {{--
            @else
            <div class="container mr-desk" style="background-color: {{ $post->type  == 'Not Important' ? '#ebebeb' : '#005493' }} ;">
            @endif
            --}}

            <small class="smaldate " > {{ $post->date }} </small>
            <div class="contentheader">
              <img src="/storage/uploads/{{$post->image}}"  class="infoimg">
              <h1> {{ $post->is_highlighted ? 'HIGHLIGHT' : '' }}  {{ $post->title  }}</h1>
            </div>
            <div class="content">
                <div class="content_imgs mt-3" >
                    <svg width="100" height="400" class="bluerect">
                      <rect width="100" height="358"  />
                    </svg>
                    @if(isset($categoryid[4]->id)&&    $categoryid[4]->id == $id)
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
                    <p class="mt-3 body-txt " >
                         {{ $post->description }}
                    </p>
                    <ul>
                        @if(isset($post->first_li))
                           <li ><span class="dot"></span>{{ $post->first_li }}</li>
                        @endif
                        @if(isset($post->second_li))
                          <li ><span class="dot"></span>{{ $post->second_li }}</li>
                        @endif
                    </ul>
                    <div class="buttons-div">
                        <a  target="_blank"  class="btn btn-primary float-left btns btnD downloadFile " >Download
                           <span> > </span>
                        </a>
                        @php
                         $files = $post->file
                        @endphp
                        @if(count($files) > 1)
                            <p>Choose language</p>
                        @endif
                        <div class="languageIcons">
                        @foreach($files as $file)
                                <div >
                                    <div class="file" id="file{{$file->id}}" name="{{$file->id}}">
                                         <img  src="/images/{{$file->language}}.png">
                                    </div>
                                </div>
                        @endforeach
                        </div>
                    </div>
                    <button class="btn btn-light float-right btns1" onclick="topFunction()">&and;</button>
                </div>
            </div>

            <hr  class="content_hr" >

        </div>
    </div>
    @endif
@endforeach



@include('inc.Blocks')
<script>
    $(document).ready(function(){

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

            $('.file').each(function () {
                 $(this).click(function () {
                     id = $(this).attr('name');
                     $('.file').css('opacity', '0.4');
                     $(this).css('opacity', '1')
                    $('.downloadFile').attr("href",'/download/'+( + id ));
                })
            })
    })

</script>

@endsection