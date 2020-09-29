@extends('layouts.admin-layout')

@section('content')
    <div class="d-flex justify-content-center mt-5 min-vh-100">
        <form id="login-form" class="d-flex flex-column form-group login-wrapper" action="{{ route('users.handle-create') }}" method="POST">
            @csrf
            <h3 class="size-22 font-weight-bolder mb-4 text-center">Create User</h3>

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
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ session('name') }}">
            </div>
            <div class="input-group m-b-20">
                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ session('email') }}">
            </div>
            <div class="input-group m-b-20">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="input-group m-b-30">
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
            </div>

            <select name="role_id" class="custom-select m-b-30">
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

