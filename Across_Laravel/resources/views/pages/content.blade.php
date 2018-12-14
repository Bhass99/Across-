@extends('layout.app')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages.css')}}" />
@php
    $categoryid = \App\Category::whereNull('parent_id')->get();

@endphp
@section('content')

    <div class="navbar-parent w-100">
        <div class="GrayBar w-50"></div>
        <div class="container navbar-child" >
            <div class="PageInfoBar">
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
    </div>
    <div class="container container-responsive">
        <p class="txtPageCore"> {{$parent->name}}/ {{isset($id_category->name)? $id_category->name :'All' }}<a href="#" style="color: #7baabe;"></a></p>
        <div class="divsInfo">
            <div class=" {{ count($parent->children) > 0 ?   'divBlock0' : 'divBlockResponsive'   }}">
                <h2 class="">{{$parent->title}}</h2>
                <p >{{$parent->description}}</p>
            </div>
            <div class=" d-block  row px-3 ">
                @php
                    $i=1;
                @endphp

                @foreach($children as $item)
                    <a href="/sub_category/{{$item->parent_id . '/'.$item->id}}" >
                        @if($block[1]->id == $parent->id)
                            <div class=" row purple{{$i}} "  style=" @if ( $id_category->id == $item->id) background: #ebebeb; @endif">
                        @elseif($block[2]->id == $parent->id)
                            <div class=" row orange{{$i}} "  style=" @if ( $id_category->id == $item->id) background: #ebebeb; @endif">
                        @endif
                            <div class="col">
                                <img src="/storage/uploads/{{$item->category_logo}}" class="iconImgs" >
                            </div>
                            <div class="col">
                                <p class="iconTxt">{{$item->name}}</p>

                            </div>
                            <p class="text-center  @if ( $id_category->id == $item->id) divArrow @else d-none @endif"> > </p>
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
    @if( isset($faqs) && $faqs == 1)
        @foreach($assets as $post)
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
        @endforeach
    @else

        <div class="container-fluid  category--{{ $parent->id }} " style="position: relative">
            @foreach($assets as $post)
                @php
                    $files = $post->file
                @endphp
            <div class="container mr-desk  {{ $post->is_highlighted ? 'highlighted' : '' }}">

                    <small class="smaldate " > {{ $post->date }} </small>
                    <div class="contentheader">
                        <img src="/storage/uploads/{{$post->image}}"  class="infoimg">
                        <h1 class="{{ $post->is_highlighted ? 'HIGHLIGHT' : '' }} ">  {{ $post->title  }}</h1>
                    </div>
                    <div class="content">
                        <div class="content_imgs mt-3" >
                            <svg width="100" height="400" class="bluerect">
                                <rect width="100" height="358"  />
                            </svg>
                            @if(isset($categoryid[4]->id)&&    $categoryid[4]->id == $id)
                                <a target="_blank" href="https://vimeo.com/{{$post->id}}">
                                    <img src="/storage/uploads/{{ $post->image }}" class="content_img" >
                                    <i class="fas fa-play-circle play-video"></i>
                                </a>
                            @else
                                <img src="/storage/uploads/{{ $post->image }}" class="content_img" >
                            @endif
                        </div>
                        <div class="content_txt">
                            <p class="mt-3 body-txt " >
                                {{ $post->description }}
                            </p>
                            <ul >
                                @if(isset($post->first_li))
                                    <li ><span class="dot">&#9679;</span> {{ $post->first_li }}</li>
                                @endif
                                @if(isset($post->second_li))
                                    <li ><span class="dot">&#9679;</span> {{ $post->second_li }}</li>
                                @endif
                            </ul>

                            <div class="buttons-div" >

                                <div class="btnDownload" >
                                    @if($categoryid[4]->id == $id)
                                        <div>
                                            <a target="_blank"  href="https://vimeo.com/{{$post->id}}" class="btn btn-primary float-left btns btnD  " style="background-color: white !important;" >open
                                                <span style="background-color: #49b9e5"> > </span>
                                            </a>
                                        </div>
                                    @else
                                        <a target="_blank"  id="downloadFile" name="{{$post->id}}" class="btn btn-primary float-left btns btnD  downloadFile " >Download
                                            <span > > </span>
                                        </a>
                                    @endif
                                </div>

                                <div class="languages" >
                                    @if(count($files) > 0)
                                        <div class="ChooseLang">
                                            <p>Choose language</p>
                                        </div>
                                    @endif
                                    <div class="languageIcons" name="{{$post->id}}">
                                        @foreach($files as $file)
                                            <div class="file" name="{{$file->id}}"  >
                                                <img src="/images/{{$file->language}}.png">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>
                    <button class="btn float-right btn-top {{ $post->is_highlighted ? 'text-white' : '' }}" style="background-color: transparent" onclick="topFunction()">&and;</button>
                    <hr  class="content_hr " style="background-color: {{ $post->is_highlighted ? '#005493' : ''}}" >
                </div>
            @endforeach
        @endif
        @if($assets instanceof \Illuminate\Pagination\LengthAwarePaginator )
            <div class="divPagination">
                {{ $assets->links() }}
            </div>
         @endif
        </div>



    @include('inc.Blocks')
    <script>

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        $(document).ready(function(){

            $(".body-txt").each(function () {
                var $window = $(window);
                var $height = 134;
                if ($(this).height() > $height ){
                    var windowsize = $window.width();

                    if(windowsize > 750 && windowsize < 992){
                        $(this).css("height", 90);
                        $(this).css("overflow-y", "scroll");
                    }else{
                        $(this).css("height", 133);
                        $(this).css("overflow-y", "scroll");
                    }


                }else {
                    $(this).css("height", "auto");
                }
            });

            $('.link-{{$id}}').css('font-weight', 'bold');
            @if(isset($parent_id_category))
                @if($parent_id_category->id == 2)
                    $('.link-2').css('font-weight', 'bold');
                @elseif($parent_id_category->id == 3)
                    $('.link-3').css('font-weight', 'bold');
                @endif
            @endif

            $('.buttons-div').each(function () {
                var oneItem = $(this);

                $('.file').css('opacity', '0.4');
                $(this).css('opacity', '1');
                var fileID = oneItem.find('.file').attr('name');
                oneItem.find('#downloadFile').attr("href",'/download/'+( + fileID ));

                oneItem.find('.file').click(function () {
                    $('.file').css('opacity', '0.4');
                    $(this).css('opacity', '1');
                    fileID = $(this).attr('name');
                    oneItem.find('#downloadFile').attr("href",'/download/'+( + fileID ));
                 })

            })
        })

    </script>

@endsection