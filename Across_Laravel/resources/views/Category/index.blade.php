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

    <div class=" container table-responsive-sm">
        <table class="table table-striped table-centered mb-0">
            <thead>
            <tr>
                <th>Category</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $item)
                @if($item-> parent_id == null)
                    <tr>
                         <td>{{$item->name}}</td>
                         <td class="table-action" style="display: inline-flex;">
                            <a href="/categories/{{$item->id}}/edit" style="color: black" >  <i class="fas fa-user-edit"></i></a>
                            <form method="POST" action="/categories/{{$item->id}} " onsubmit="return confirm('Are you sure?')">
                                {{method_field('delete')}}
                                {!! csrf_field() !!}
                                <button type="submit" style="border: none; background: none; cursor: pointer" ><i class="fas fa-user-times"></i></button>
                            </form>
                        </td>
                        <td><a href="posts/create">   create post   </a></td>
                    </tr>

                @else
                    <tr>
                        <td>... {{$item->name}}</td>
                        <td class="table-action" style="display: inline-flex;">
                            <a href="/categories/{{$item->id}}/edit" style="color: black" >  <i class="fas fa-user-edit"></i></a>
                            <form method="POST" action="/categories/{{$item->id}} " onsubmit="return confirm('Are you sure?')">
                                {{method_field('delete')}}
                                {!! csrf_field() !!}
                                <button type="submit" style="border: none; background: none; cursor: pointer" ><i class="fas fa-user-times"></i></button>
                            </form>
                        </td>
                        <td><a href="posts/create">   create post   </a></td>
                    </tr>
                    @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


