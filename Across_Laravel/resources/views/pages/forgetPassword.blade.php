
@extends('layout.loginlayout')
<link rel="stylesheet" type="text/css" href="{{asset('css/forgetPassword.css')}}" />
@section('content')
<div class="ForgetPasContainer" >
    <div class="Form">
        <h2> Forgot Password?</h2>
        <p>Enter yout email address to reset your password</p>
        <form method="POST" action="{{ route('sendPassword') }}">
            @csrf
            <input name="email" class="form-control "  placeholder="Email adres">
            <button class="btn btn-primary  mt-4" name="submit" type="submit" value="submit"> Send</button>
            @if(session('email_send'))
                <h1>
                    {{ session('email_send') }}
                </h1>
            @endif

        </form>
        <a  href="{{ route('login') }}"><button class="btn btn-light back" type="button"> Back</button></a>
    </div>
</div>

@endsection