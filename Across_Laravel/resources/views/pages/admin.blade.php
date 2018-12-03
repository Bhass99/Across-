@extends('layout.loginlayout')
<link rel="stylesheet" type="text/css" href="{{asset('css/users_index.css')}}" />
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

@section('content')
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>AMRYT</h3>
            </div>

            <ul class="list-unstyled components">
               <p class="welcTxt"> Welcome {{ Auth::user()->last_name }} </p>
                <li>
                    <a  href="/adminpages"  >Pages</a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="/adminusers">All Users</a>
                        </li>
                        <li>
                            <a href="/users/create">Add a new user</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="/index" class="download">Home Page</a>
                </li>
                <li>
                    <a href="/logout" class="article">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info" style=" background: #1d4c7b; color: #ffb100;">
                        <i class="fas fa-align-left"></i>
                    </button>
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

                </div>

            </nav>
            <div class="container" >

                    @if(isset($users))
                    <div class="users">
                     <div class=" container table-responsive-sm">
                        <table class="table table-centered mb-0">
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
                                    <td class="table-action" >
                                        <a href="{{ route('users.edit', $user->id) }}" class="edit" >  <i class="fas fa-user-edit"></i></a>
                                        <form class="m-0" method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline" onsubmit="return confirm('Are you sure you want to delete {{$user->last_name}}?')">
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
                    </div>
                    @endif


                    @if(isset($category))
                    <div class="categories">
                        <div class=" container table-responsive-sm">
                                    @foreach($category as $item)
                                        @if($item->parent_id == null)
                                                <div class="AdminCategories" >
                                                    <div class="CategoryItem"><a href="#sub{{$item->id}}" data-toggle="collapse" aria-expanded="false" class="fas fa-chevron-circle-down toggle arrow" ></a></div>
                                                    <div class="CategoryItem">{{$item->name}}</div>
                                                    <div class="table-action CategoryItem"><a href="/categories/{{$item->id}}/edit" class="editIcon"  > <i class="far fa-edit"></i></a>
                                                    </div>
                                                    <div class="CategoryItem">
                                                        @if($item->name == "Core Resources" || $item->name == "Understanding Lojuxta")
                                                        <a href="{{route('secondcategory.create', ['cid' => $item->id])}}" class="btn-block" >Category</a>

                                                        @else
                                                        <a href="{{route('posts.create', ['cid' => $item->id])}}" class="btn-block" >Asset</a>
                                                        @endif
                                                   </div>
                                                </div>
                                            @foreach($posts as $post)
                                                @if($post->post_parent_id == $item->id)
                                                    <div class=" CategoriesAssets collapse list-unstyled" id="sub{{$item->id}}">
                                                        <div  class=" AssetItem table-user ">{{$post->title}}</div>
                                                        <div class="AssetItem" >{{$post->date}}</div>
                                                        <div class="AssetItem" >{{$post->posted_by}}</div>
                                                        <div class="AssetItem">{{$post->language}}</div>
                                                        <div class="table-action AssetItem ">
                                                            <a href="/posts/{{$post->id}}/edit" class="editIcon" ><i class="far fa-edit"></i></a>
                                                            <form method="POST" action="/posts/{{$post->id}} " onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                                {{method_field('delete')}}
                                                                {!! csrf_field() !!}
                                                                <button type="submit" style="border: none; background: none; cursor: pointer" ><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @foreach($sub_category as $child)
                                                @if($child->parent_id == $item->id)

                                                    <div  class=" SubCategories collapse " id="sub{{$item->id}}">
                                                        <div class="arrow"><a href="#post{{$child->id}}"  data-toggle="collapse" aria-expanded="false" class="fas fa-chevron-circle-down toggle arrow " ></a></div>
                                                        <div>{{$child->name}} </div>
                                                        <div class="table-action " >
                                                            <a href="/secondcategory/{{$child->id}}/edit" class="editIcon" > <i class="far fa-edit"></i></a>
                                                            <form method="POST" action="/categories/{{$child->id}} " onsubmit="return confirm('Are you sure ?')">
                                                                {{method_field('delete')}}
                                                                {!! csrf_field() !!}
                                                                <button type="submit" style="border: none; background: none; cursor: pointer" ><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                        </div>
                                                        <div><a href="{{route('posts.create', ['cid' => $child->id])}}" >Asset</a></div>
                                                    </div>
                                                    @foreach($posts as $post)
                                                        @if($post->post_parent_id == $child->id)
                                                            <div class=" CategoriesAssets collapse list-unstyled" id="post{{$child->id}}" >
                                                                <div class="AssetItem table-user">{{$post->title}}</div>
                                                                <div class="AssetItem">{{$post->date}}</div>
                                                                <div class="AssetItem">{{$post->posted_by}}</div>
                                                                <div class="AssetItem">{{$post->language}}</div>
                                                                <div class="AssetItem" >{{$post->type}}</div>
                                                                <div class="table-action AssetItem">
                                                                    <a href="/posts/{{$post->id}}/edit" class="editIcon" ><i class="far fa-edit"></i></a>
                                                                    <form method="POST" action="/posts/{{$post->id}} " onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                                        {{method_field('delete')}}
                                                                        {!! csrf_field() !!}
                                                                        <button type="submit" style="border: none; background: none; cursor: pointer" ><i class="fas fa-trash-alt"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>



                        </div>
                    </div>
                    @endif


            </div>

    <script>
        $(document).ready(function () {

            $('.fa-chevron-circle-down').click(function () {

                    $(this).css( {'transform' : 'rotate(180deg)'});

            });


            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

        });
    </script>



@endsection

