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


        <table class="table table-striped table-centered mb-0">
            <thead>
            <tr>
                <th>Image</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Date</th>
                <th>Posted by</th>
            </tr>
            </thead>
            <tbody>
            @foreach($faq as $item)
                <tr>
                    <td>{{$item->image}}</td>
                    <td>{{$item->question}}</td>
                    <td>{{$item->answer}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->posted_by}}</td>
                    <td class="table-action" style="display: inline-flex;">
                        <a href="/faq/{{$item->id}}/edit" style="color: black" >  <i class="fas fa-user-edit"></i></a>
                        <form method="POST" action="/faq/{{$item->id}} " onsubmit="return confirm('Are you sure?')">
                            {{method_field('delete')}}
                            {!! csrf_field() !!}
                            <button type="submit" style="border: none; background: none; cursor: pointer" ><i class="fas fa-user-times"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


