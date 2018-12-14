
@extends('layout.loginlayout')
<link rel="stylesheet" type="text/css" href="{{asset('css/forgetPassword.css')}}" />
@section('content')
<div class="ForgetPasContainer" >
    <div class="Form">
        <h2> Forgot Password?</h2>
        <p>Enter yout email address to reset your password</p>
        <form method="POST" action="{{ route('sendPassword') }}">
            @csrf

            <input name="email" class="form-control mt-2 "  placeholder="Email adres">
            <button class="btn btn-primary  mt-4" name="submit" type="submit" value="submit"> Send</button>


        </form>
        <a  href="{{ route('login') }}"><button class="btn btn-danger back " type="button"> Back</button></a>
    </div>
    @if(session('email_send'))
        <div class="alert-success" style="padding: 10px 10px">
            <h3 class="text-center ">{{ session('email_send') }}</h3>
        </div>
    @endif
</div>
<img src="/images/body.png" class="bg-image">
@endsection