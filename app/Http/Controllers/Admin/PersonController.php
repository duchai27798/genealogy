<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Repositories\GenderRepository;
use App\Repositories\ParentInfoRepository;
use App\Repositories\PersonRepository;
use App\Repositories\PersonStatusRepository;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    private $genderRepository;
    private $personRepository;
    private $parentInfoRepository;
    private $personStatusRepository;

    public function __construct(
        GenderRepository $genderRepository,
        PersonRepository $personRepository,
        ParentInfoRepository $parentInfoRepository,
        PersonStatusRepository $personStatusRepository
    ) {
        $this->genderRepository = $genderRepository;
        $this->personRepository = $personRepository;
        $this->parentInfoRepository = $parentInfoRepository;
        $this->personStatusRepository = $personStatusRepository;
    }

    function dashboard()
    {
        return view('admin.person-management.dashboard', [
            'route' => 'person',
            'persons' => $this->personRepository->getAll(),
            'parents' => $this->parentInfoRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.person-management.person-editor', [
            'route' => 'person',
            'personStatuses' => $this->getListPersonStatus(),
            'genders' => $this->getListGender(),
            'parents' => $this->getListParent(),
            'person' => null,
        ]);
    }

    public function handleCreate(PersonRequest $request)
    {
        $user = $request->all();

        unset($user['_token']);

        $this->personRepository->create($user);

        return redirect()->route('person-management');
    }

    public function edit($id)
    {
        return view('admin.person-management.person-editor', [
            'route' => 'person',
            'person' => $this->personRepository->find($id),
            'personStatuses' => $this->getListPersonStatus(),
            'parents' => $this->getListParent(),
            'genders' => $this->getListGender(),
        ]);
    }

    public function handleEdit(PersonRequest $request, $id)
    {
        $user = $request->all();

        unset($user['_token']);

        $this->personRepository->update($id, $user);

        return redirect()->route('person-management');
    }

    public function destroy(Request $request, $id)
    {
        $this->personRepository->delete($id);

        return redirect()->route('person-management');
    }

    public function getListGender()
    {
        $listGenders = $this->genderRepository->getAll();
        $genders = collect();

        foreach ($listGenders as $gender) {
            $genders[$gender->gender_id] = $gender->name;
        }

        return $genders;
    }

    public function getListPersonStatus()
    {
        $listPersonStatus = $this->personStatusRepository->getAll();
        $personStatus = collect();

        foreach ($listPersonStatus as $status) {
            $personStatus[$status->person_status_id] = $status->name;
        }

        return $personStatus;
    }

    public function getListParent()
    {
        $listParent = $this->parentInfoRepository->getAll();
        $parents = collect([null => 'NULL']);

        foreach ($listParent as $parent) {
            if ($parent->father) {
                $parents[$parent->parent_info_id] = $parent->father->getFullName();
            } else {
                $parents[$parent->parent_info_id] = $parent->mother->getFullName();
            }
        }

        return $parents;
    }
}
