@extends('layouts.main-layout')

@section('content')
    <button class="btn btn-secondary" id="open-modal-upload m-5" data-toggle="modal" data-target="#modal-upload-file">Upload File</button>
    @foreach($files as $file)
        <img src="{{ $file }}">
    @endforeach

    @include('client.dialog.upload-file-dialog')
@endsection
