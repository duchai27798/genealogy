@extends('layouts.main-layout')

@section('body')
    <div class="login-container d-flex justify-content-center align-items-center min-vh-100">
        <form id="login-form" autocomplete="off" class="d-flex flex-column form-group login-wrapper" action="{{ route('handle-register') }}" method="POST">
            @csrf
            <h3 class="size-22 font-weight-bolder mb-4 text-center">Register</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="pl-0 nav flex-column">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="input-group m-b-20">
                <input type="text" class="form-control" placeholder="Name" name="name">
            </div>
            <div class="input-group m-b-20">
                <input type="text" class="form-control" autocomplete="off" placeholder="Email" name="email">
            </div>
            <div class="input-group m-b-20">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="input-group m-b-30">
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
            </div>

            <select name="role_id" class="custom-select m-b-30" disabled>
                @foreach($roles as $role)
                    @if($role['name'] === 'user')
                        <option value="{{ $role['role_id'] }}" selected>{{ $role['name'] }}</option>
                    @else
                        <option value="{{ $role['role_id'] }}">{{ $role['name'] }}</option>
                    @endif
                @endforeach
            </select>

            <input type="submit" class="btn btn-success" value="Register"/>
        </form>
    </div>
@endsection

