@extends('layouts.admin-layout')

@section('content')
    <div class="d-flex justify-content-center mt-4">
        <form id="login-form" class="login-form d-flex flex-column form-group" action="" method="POST">
            @csrf
            <h3 class="size-22 font-weight-bolder mb-4 text-center">Create Parent</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="pl-0 nav flex-column">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::select('parent_status_id', $parentStatuses, null, ['class' => 'custom-select m-b-30']) }}
            {{ Form::select('father_id', $fathers, null, ['class' => 'custom-select m-b-30']) }}
            {{ Form::select('mother_id', $mothers, null, ['class' => 'custom-select m-b-30']) }}
            <div class="input-group m-b-30">
                <textarea class="form-control" name="description" placeholder="Description" cols="10"></textarea>
            </div>

            <input type="submit" class="btn btn-success" value="Login"/>
        </form>
    </div>
@endsection
