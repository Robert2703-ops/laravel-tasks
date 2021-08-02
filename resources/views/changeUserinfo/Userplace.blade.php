@extends('templates.templateFormerror')

@section('name')
    Change user's info
@endsection

@section('title')
    <h1>Change your name or password</h1>
@endsection

@section('form')
    <form action="updateName" method="POST" class="changeInfo">
        @method('PUT')
        @csrf

        <div>
            <label>User name</label>
            <input type="text" value="{{ $user['name'] }}" name="name">
        </div>
        
        <input type="submit" value="Change">

    </form>

    <form action="updatePassword" method="POST" class="changeInfo">
        @method('PUT')
        @csrf
        
        <div class="password elementVerification">
            <label>Old password</label>

            <div class="icon">
                <input type="password" name="password">
                <button type="button"> <i class="far fa-eye-slash"></i></button>
            </div>
        </div>
        
        <div class="newPassword elementVerification">
            <label>New password</label>

            <div class="icon">
                <input type="password" name="password">
                <button type="button"><i class="far fa-eye-slash"></i></button>
            </div> 
        </div>
        
        <input type="submit" value="Change">
    </form>
@endsection

@section('link')
    <a href="{{ route('dashboard') }}" id="dashboard">Dashboard</a>
@endsection