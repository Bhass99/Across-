<div class="WC_bar ">
    <div> <i class="far fa-user-circle" ></i> Welcome {{ Auth::user()->first_name }} </div>
    @if(Auth::user()->role == "admin")
        <button ><a href="{{ url('/adminpages') }}">Admin</a></button>
    @endif
    <button ><a href="{{ route('logout') }}">{{ __('Logout') }}</a></button>
    <i class="fas fa-globe-asia"></i>
</div>

<div class="header">
    <div class="line1 " >
                 <a href="{{ url('/index') }}"> <img src="/images/logo.png" ></a>

            <div class="headerLeft">
                <i class="fas fa-user"></i>
                <i class="fas fa-globe-asia"></i>
                <i class="fas fa-align-justify" onclick="showNav()"></i>
            </div>
            <div id="nav" >
                @foreach($category as $item)
                    @if($item-> parent_id == null)
                       <a class="link1 NavLink" href="/category/{{$item->id}}" ><div class="link">{{$item->name}}</div></a>
                    @endif
                @endforeach
            </div>

    </div>
</div>

