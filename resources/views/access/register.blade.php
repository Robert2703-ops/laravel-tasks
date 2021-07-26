@extends('templates.templateFormerror')

@section('name')
    Register
@endsection

@section('form')

    @section('title')
        <h2>Register</h2>
    @endsection

    <form action="{{ route('register') }}" method="post">
        @csrf
            
            <div>
                <label>User name: </label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>

            <div>
                <label>Email: </label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="password elementVerification">
                <label>Password: </label>

                <div class="icon">
                    <input type="password" name="password">
                    <button type="button"><div><img src="/images/closed_eye.png"></div></button>
                </div>
            </div>
            
            <div class="passwordConfirmation elementVerification">
                <label>Confirm your password: </label>
                
                <div class="icon">
                    <input type="password" name="password_confirmation">
                    <button type="button"><div><img src="/images/closed_eye.png"></div></button>
                </div>
            </div>

            <input type="submit" value="Create">
            
    </form>
@endsection

@section('link')
    <p>Have an account already? <a href="{{ route('login') }}">Login</a> </p>
@endsection