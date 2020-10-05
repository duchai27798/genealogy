@extends('layouts.admin-layout')

@section('content')
    <div class="d-flex justify-content-center mt-4">
        <form
            id="login-form"
            class="login-form d-flex flex-column form-group"
            action="{!! $person ? route('persons.handle-edit', ['id' => $person->people_id]) : route('persons.handle-create') !!}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <h3 class="size-22 font-weight-bolder mb-4 text-center">{{ $person ? 'Edit' : 'Create' }} Person</h3>

            <div class="form-group m-b-20">
                <input
                    type="text"
                    class="form-control"
                    placeholder="First Name"
                    name="firstname"
                    value="{!! Helper::getCache('firstname', $person) !!}">
                @error('firstname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-b-30">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Last Name"
                    name="lastname"
                    value="{!! Helper::getCache('lastname', $person) !!}">
                @error('lastname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{ Form::select('gender_id', $genders, Helper::getCache('gender_id', $person), ['class' => 'custom-select m-b-30']) }}

            {{ Form::select('person_status_id', $personStatuses, Helper::getCache('person_status_id', $person), ['class' => 'custom-select m-b-30']) }}

            {{ Form::select('position_id', $positions, Helper::getCache('position_id', $person), ['class' => 'custom-select m-b-30']) }}

            {{ Form::select('parent_info_id', $parents, Helper::getCache('parent_info_id', $person), ['class' => 'custom-select m-b-30']) }}

            <div class="form-group m-b-30">
                <input type="date" class="form-control" placeholder="Birthday" name="birthday" value="{!! Helper::getCache('birthday', $person) !!}">
                @error('birthday')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-b-30">
                <input type="file" class="form-control" placeholder="Choose File" name="img">
            </div>

            <div class="form-group m-b-30">
                <input type="text" class="form-control" placeholder="Email" name="email" value="{!! Helper::getCache('email', $person) !!}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-b-30">
                <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" value="{!! Helper::getCache('phone_number', $person) !!}">
                @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-b-30">
                <input type="text" class="form-control" placeholder="Address" name="address" value="{!! Helper::getCache('address', $person) !!}">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-b-30">
                <textarea class="form-control" name="description" placeholder="Description" cols="10">{!! Helper::getCache('description', $person) !!}</textarea>
                @error('Description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-success" value="Login"/>
        </form>
    </div>
@endsection
