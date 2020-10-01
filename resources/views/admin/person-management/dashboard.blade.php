@extends('layouts.admin-layout')

@section('content')
    <div class="container">
        <h3 class="size-22 font-weight-bold text-center mt-5 mb-4">Person Management</h3>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="person-tab" data-toggle="tab" href="#person" role="tab" aria-controls="person" aria-selected="true">Person</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="parent-tab" data-toggle="tab" href="#parent" role="tab" aria-controls="parent" aria-selected="false">Parent</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active m-t-30 m-l-20 m-r-20" id="person" role="tabpanel" aria-labelledby="person-tab">
                <table class="table table-custom">
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
                            <td>{{ $person->gender->name }}</td>
                            <td>{{ $person->getBirthday() }}</td>
                            <td>{{ $person->status->name }}</td>
                            <td>
                                <div><span class="mr-2">Father:</span>{{ $person->getFatherName() }}</div>
                                <div class="mt-2"><span class="mr-2">Mother:</span>{{ $person->getMotherName() }}</div>
                            </td>
                            <td>
                                <a href="{!! route('persons.edit', ['id' => $person->people_id]) !!}">
                                    <i class="far fa-edit text-primary size-18 m-r-10"></i>
                                </a>
                                <i class="far fa-trash-alt size-18 text-danger"></i>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade m-t-30 m-l-20 m-r-20" id="parent" role="tabpanel" aria-labelledby="parent-tab">
                <table class="table table-custom">
                    <thead class="thead-light">
                    <tr class="size-14">
                        <th class="font-weight-bold" scope="col">#</th>
                        <th class="font-weight-bold" scope="col">Father</th>
                        <th class="font-weight-bold" scope="col">Mother</th>
                        <th class="font-weight-bold" scope="col">Status</th>
                        <th class="font-weight-bold" scope="col">Children</th>
                        <th class="font-weight-bold" scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($parents as $index => $parent)
                            <tr class="size-14">
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $parent->father ? $parent->father->getFullName() : '-' }}</td>
                                <td>{{ $parent->mother ? $parent->mother->getFullName() : '-' }}</td>
                                <td>{{ $parent->parent_status_id ?? '-' }}</td>
                                <td>
                                    <ul>
                                        @foreach ($parent->children as $child)
                                            <li>{{ $child->getFullName() }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <i class="far fa-edit text-primary size-18 m-r-10"></i>
                                    <i class="far fa-trash-alt size-18 text-danger"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
