@extends('layout.loginlayout')
<link rel="stylesheet" type="text/css" href="{{asset('css/users_index.css')}}" />
@section('content')
    <h3 class="welcTxt"> Welcome {{ Auth::user()->last_name }} </h3>
    <div class="message">
        @if(session()->has('success'))
            {{ session('success') }}
            <br />
        @endif
        @if(session()->has('edited'))
            {{ session('edited') }}
            <br />
        @endif
    </div>
    <div class="container text-center">

        <a class="btn btn-success create"  href="{{ route('logout') }}">Logout</a>
        <a class="btn btn-success create" href="/index">Home</a>
        <a class="btn btn-success create" href="/posts/create">New FAQ</a>
        <a class="btn btn-success create" href="/users">Users</a>
    </div>
    <div class=" container table-responsive-sm">



    @foreach($category as $item)
    <div class="container container-responsive">
        <div class="divsInfo">
            <div class="divBlock">
                <h2 class="">{{$item->title}}</h2>
                <p>{{$item->description}} </p>
            </div>

        </div>

        <div class=" d-block  row px-3 ">
            <p class="divsTxt">{{$item->small_title}}</p>

            <a href="#"><div class=" row purple1 ">
                    <div class="col">
                        <img src="{{$item->category_image}}" class="iconImgs" >
                    </div>
                    <div class="col">
                        <p class="iconTxt">{{$item->category_title}}</p>
                        <p class="text-center divArrow" > > </p>
                    </div>
                </div></a>
            <a href="{{ route('coreRescourcesfaqs') }}"><div class=" row purple2 ">

        </div>
    </div>

    @endforeach
@endsection


