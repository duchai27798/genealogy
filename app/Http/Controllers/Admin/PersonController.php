<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Repositories\GenderRepository;
use App\Repositories\PersonRepository;

class PersonController extends Controller
{
    private $genderRepository;
    private $personRepository;

    public function __construct(GenderRepository $genderRepository, PersonRepository $personRepository)
    {
        $this->genderRepository = $genderRepository;
        $this->personRepository = $personRepository;
    }

    function dashboard() {
        return view('admin.person-management.dashboard', ['route' => 'person', 'persons' => $this->personRepository->getAll()]);
    }

    public function create()
    {
        return view('admin.person-management.person-editor', ['route' => 'person', 'genders' => $this->genderRepository->getAll()]);
    }

    public function handleCreate(PersonRequest $request)
    {
        dd($request->all());
    }
}
