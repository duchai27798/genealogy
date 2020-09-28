@extends('layouts.admin-layout')

@section('body')
    <div class="d-flex justify-content-center mt-4">
        <form id="login-form" class="login-form d-flex flex-column form-group" action="{{ route('persons.store') }}" method="POST">
            @csrf
            <h3 class="size-22 font-weight-bolder mb-4 text-center">Create Person</h3>
            <div id="form-person-error" class="alert-danger size-14 m-b-20"></div>
            <div class="input-group m-b-20">
                <input type="text" class="form-control" placeholder="First Name" name="firstname">
            </div>
            <div class="input-group m-b-30">
                <input type="text" class="form-control" placeholder="Last Name" name="lastname">
            </div>
            <select name="gender" class="custom-select m-b-30">
                @foreach($genders as $gender)
                    <option value="{{ $gender['gender_id'] }}">{{ $gender['name'] }}</option>
                @endforeach
            </select>
            <div class="input-group m-b-30">
                <input type="date" class="form-control" placeholder="Birthday" name="birthday">
            </div>
            <div class="input-group m-b-30">
                <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="input-group m-b-30">
                <input type="text" class="form-control" placeholder="Phone Number" name="phone_number">
            </div>
            <div class="input-group m-b-30">
                <input type="text" class="form-control" placeholder="Address" name="address">
            </div>
            <div class="input-group m-b-30">
                <input type="text" class="form-control" placeholder="Description" name="description">
            </div>

            <input type="submit" class="btn btn-success" value="Login"/>
        </form>
    </div>
@endsection
