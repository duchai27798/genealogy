@extends('layouts.main-layout')

@section('content')
    @foreach($files as $file)
        <img src="{{ $file }}">
    @endforeach

    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <button class="btn btn-secondary" id="open-modal-upload" data-toggle="modal" data-target="#modal-upload-file">Upload File</button>
    </div>

    @include('client.dialog.upload-file-dialog')
@endsection
