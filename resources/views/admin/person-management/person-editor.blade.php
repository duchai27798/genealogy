@extends('layouts.admin-layout')

@section('content')
    <div class="d-flex justify-content-center mt-4">
        <form id="login-form" class="login-form d-flex flex-column form-group" action="{!! $person ? route('persons.handle-edit', ['id' => $person->people_id]) : route('persons.handle-create') !!}" method="POST">
            @csrf
            <h3 class="size-22 font-weight-bolder mb-4 text-center">{{ $person ? 'Edit' : 'Create' }} Person</h3>

{{--            {{ getCache('', '') }}--}}

            <div class="form-group m-b-20">
                <input
                    type="text"
                    class="form-control"
                    placeholder="First Name"
                    name="firstname"
                    value="{{ session('cache') && session('cache')['firstname'] ? session('cache')['firstname'] : ($person ? $person->firstname : '') }}">
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
                    value="{{ session('cache') && session('cache')['lastname'] ? session('cache')['lastname'] : ($person ? $person->lastname : '') }}">
                @error('lastname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{ Form::select('gender_id', $genders, $person ? $person->gender_id : 0, ['class' => 'custom-select m-b-30']) }}

            {{ Form::select('person_status_id', $personStatuses, $person ? $person->person_status_id : 0, ['class' => 'custom-select m-b-30']) }}

            {{ Form::select('parent_info_id', $parents, $person ? $person->parent_info_id : 0, ['class' => 'custom-select m-b-30']) }}

            <div class="form-group m-b-30">
                <input type="date" class="form-control" placeholder="Birthday" name="birthday" value="{{ $person ? $person->getBirthday() : null }}">
                @error('birthday')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-b-30">
                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $person ? $person->email : '' }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-b-30">
                <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" value="{{ $person ? $person->phone_number : '' }}">
                @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-b-30">
                <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $person ? $person->address : '' }}">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-b-30">
                <textarea class="form-control" name="description" placeholder="Description" cols="10">{{ $person ? $person->description : '' }}</textarea>
                @error('Description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-success" value="Login"/>
        </form>
    </div>
@endsection
