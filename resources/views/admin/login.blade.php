@extends('layouts.main-layout')

@section('body')
    <div class="login-container d-flex justify-content-center align-items-center min-vh-100">
        <form id="login-form" class="d-flex flex-column form-group login-wrapper" action="{{ route('handle-login') }}" method="POST">
            @csrf
            <h3 class="size-22 font-weight-bolder mb-4 text-center">Login</h3>
            <div id="login-error" class="alert-danger size-14 m-b-20"></div>
            <div class="input-group m-b-20">
                <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="input-group m-b-30">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <input type="submit" class="btn btn-success" value="Login"/>
        </form>
    </div>
@endsection

