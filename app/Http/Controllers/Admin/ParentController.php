<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ParentStatusRepository;
use App\Repositories\PersonRepository;

class ParentController extends Controller
{
    private $parentStatusRepository;
    private $personRepository;

    public function __construct(ParentStatusRepository $parentStatusRepository, PersonRepository $personRepository)
    {
        $this->parentStatusRepository = $parentStatusRepository;
        $this->personRepository = $personRepository;
    }

    public function create()
    {
        return view('admin.person-management.parent-editor', [
            'route' => 'person',
            'parentStatuses' => $this->getListParentStatus(),
            'fathers' => $this->getListParent('male'),
            'mothers' => $this->getListParent('female'),
        ]);
    }

    public function getListParentStatus()
    {
        $listParentStatus = $this->parentStatusRepository->getAll();
        $parentStatuses = collect();

        foreach ($listParentStatus as $parentStatus) {
            $parentStatuses[$parentStatus->parent_status_id] = $parentStatus->name;
        }

        return $parentStatuses;
    }

    public function getListParent($gender)
    {
        $listParent = $this->personRepository->getPersonByGender($gender);
        $parents = collect();

        foreach ($listParent as $parent) {
            $parents[$parent->people_id] = $parent->getFullName();
        }

        return $parents;
    }
}
