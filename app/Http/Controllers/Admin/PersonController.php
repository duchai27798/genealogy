<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Repositories\GenderRepository;

class PersonController extends Controller
{
    private $genderRepository;

    public function __construct(GenderRepository $genderRepository)
    {
        $this->genderRepository = $genderRepository;
    }

    public function create()
    {
        return view('admin.person-editor', ['genders' => $this->genderRepository->getAll()]);
    }

    public function handleCreate(PersonRequest $request)
    {
        return view('admin.person-editor');
    }
}
