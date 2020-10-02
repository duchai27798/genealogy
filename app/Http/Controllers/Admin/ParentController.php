<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ParentInfoRepository;
use App\Repositories\ParentStatusRepository;
use App\Repositories\PersonRepository;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    private $parentStatusRepository;
    private $personRepository;
    private $parentInfoRepository;

    public function __construct(
        ParentStatusRepository $parentStatusRepository,
        PersonRepository $personRepository,
        ParentInfoRepository $parentInfoRepository
    ) {
        $this->parentStatusRepository = $parentStatusRepository;
        $this->personRepository = $personRepository;
        $this->parentInfoRepository = $parentInfoRepository;
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

    public function handleCreate(Request $request)
    {
        $parent = $request->all();

        unset($parent['_token']);

        if ($parent['father_id'] || $parent['mother_id']) {
            $this->parentInfoRepository->create($parent);
        }

        return redirect()->route('parents.create')->with('message', 'Please select parent!');
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
        $parents = collect([null => 'NULL']);

        foreach ($listParent as $parent) {
            $parents[$parent->people_id] = $parent->getFullName();
        }

        return $parents;
    }
}
