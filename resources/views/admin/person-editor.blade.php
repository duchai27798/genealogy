@extends('layouts.admin-layout')

@section('body')
    <form id="login-form" class="d-flex flex-column form-group" action="{{ route('') }}" method="POST">
        @csrf
        <h3 class="size-22 font-weight-bolder mb-4 text-center">Create Person</h3>
        <div id="form-person-error" class="alert-danger size-14 m-b-20"></div>
        <div class="input-group m-b-20">
            <input type="text" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="input-group m-b-30">
            <input type="text" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="input-group m-b-30">
            <input type="text" class="form-control" placeholder="Password" name="password">
        </div>
        <input type="submit" class="btn btn-success" value="Login"/>
    </form>
@endsection
