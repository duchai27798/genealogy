@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <button class="btn btn-secondary m-5" id="open-modal-upload" data-toggle="modal" data-target="#modal-upload-file">Upload File</button>

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($files as $index => $file)
                    <tr>
                        <th scope="row" class="align-middle">{{ $index + 1 }}</th>
                        <td>
                            <img src="{{ $file }}" class="preview-img-item">
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('client.dialog.upload-file-dialog')
@endsection
