@extends('templates.templateFormerror')

@section('name')
    Login
@endsection

@section('form')
    
    @section('title')
        <h2>Login</h2>
    @endsection

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        
        <div class="password elementVerification">
            <label>Password</label>
            
            <div class="icon">
                <input type="password" name="password">
                <button type="button"><div><img src="/images/closed_eye.png"></div></button>
            </div>
        </div>
             
        <input type="submit" value="Login">
    </form>
@endsection

@section('link')
    <p>Dont have an account? <a href="{{ route('register') }}">Create account</a> </p>
@endsection