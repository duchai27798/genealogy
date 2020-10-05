@extends('layouts.main-layout')

@section('content')
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-upload-file">Upload File</button>
    </div>

    @include('client.dialog.upload-file-dialog')
@endsection
