@extends('layouts.main-layout')

@section('content')
    <div id="tree-diagram" style="background-color: white; border: solid 1px black; width: 100vw; height: calc(100vh - 50px)"></div>
    <button class="btn btn-secondary" id="zoomToFit">Zoom to Fit</button>
    <button class="btn btn-secondary" id="centerRoot">Center on root</button>
    <script src="{{ asset('js/tree-diagram.js') }}"></script>
    <script>
        $(document).ready(function () {
            initGenealogy();
        })
    </script>
@endsection
