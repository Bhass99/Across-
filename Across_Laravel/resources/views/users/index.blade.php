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
       <a href="{{ route('users.create') }}" class="btn btn-success create">New User</a>
       <a class="btn btn-success create" href="/posts">Posts</a>
   </div>
   <div class=" container table-responsive-sm">
       <table class="table table-striped table-centered mb-0">
           <thead>
           <tr>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Email</th>
               <th>Action</th>
           </tr>
           </thead>
           <tbody>
           @foreach($users as $user)
           <tr>
               <td class="table-user">
                   {{ $user->first_name}}
               </td>
               <td>{{ $user->last_name}}</td>
               <td>{{ $user->email}}</td>
               <td class="table-action" style="display: inline-flex;">
                 <a href="{{ route('users.edit', $user->id) }}" style="color: black" >  <i class="fas fa-user-edit"></i></a>
                   <form class="m-0" method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline" onsubmit="return confirm('Are you sure?')">
                       <input type="hidden" name="_method"  value="DELETE">
                       <button type="submit" style="border: none; background: none; cursor: pointer" ><i class="fas fa-user-times"></i></button>
                       {!! csrf_field() !!}
                   </form>
               </td>
           </tr>
           @endforeach
           </tbody>
       </table>
   </div>
@endsection


