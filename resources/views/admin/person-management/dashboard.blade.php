@extends('layouts.admin-layout')

@section('content')
    <div class="container">
        <h3 class="size-22 font-weight-bold text-center mt-5 mb-4">Person Management</h3>
        <table class="table">
            <thead class="thead-light">
            <tr class="size-14">
                <th class="font-weight-bold" scope="col">#</th>
                <th class="font-weight-bold" scope="col">First Name</th>
                <th class="font-weight-bold" scope="col">Last Name</th>
                <th class="font-weight-bold" scope="col">Gender</th>
                <th class="font-weight-bold" scope="col">Birthday</th>
                <th class="font-weight-bold" scope="col">Status</th>
                <th class="font-weight-bold" scope="col">Parent</th>
                <th class="font-weight-bold" scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($persons as $index => $person)
                    <tr class="size-14">
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $person->firstname }}</td>
                        <td>{{ $person->lastname }}</td>
                        <td>{{ $person->genser_id }}</td>
                        <td>{{ $person->birthday }}</td>
                        <td>{{ $person->status_id }}</td>
                        <td>{{ $person->parentInfo }}</td>
                        <td>
                            <i class="far fa-edit text-primary size-18 m-r-10"></i>
                            <i class="far fa-trash-alt size-18 text-danger"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
