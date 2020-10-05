<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Repositories\GenderRepository;
use App\Repositories\ParentInfoRepository;
use App\Repositories\PersonRepository;
use App\Repositories\PersonStatusRepository;
use App\Repositories\PositionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PersonController extends Controller
{
    private $genderRepository;
    private $personRepository;
    private $parentInfoRepository;
    private $personStatusRepository;
    private $positionRepository;

    public function __construct(
        GenderRepository $genderRepository,
        PersonRepository $personRepository,
        ParentInfoRepository $parentInfoRepository,
        PersonStatusRepository $personStatusRepository,
        PositionRepository $positionRepository
    ) {
        $this->genderRepository = $genderRepository;
        $this->personRepository = $personRepository;
        $this->parentInfoRepository = $parentInfoRepository;
        $this->personStatusRepository = $personStatusRepository;
        $this->positionRepository = $positionRepository;
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
            'positions' => $this->getListPosition(),
        ]);
    }

    public function handleCreate(PersonRequest $request)
    {
        $user = $request->all();

        unset($user['_token']);
        unset($user['img']);

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
            'positions' => $this->getListPosition(),
        ]);
    }

    public function handleEdit(Request $request, $id)
    {
        $user = $request->all();

        if ($request->hasFile('img')) {
            $image      = $request->file('img');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());

            $img->stream(); // <-- Key point

            //dd();
            $isUploaded = Storage::disk('public')->put('images'.'/'.$fileName, $img, 'public');

            if ($isUploaded === true) {
                $user['img_src'] = 'images'.'/'.$fileName;

                $this->update($user, $id);
            }
        } else {
            $this->update($user, $id);
        }
    }

    public function update($user, $id)
    {
        unset($user['_token']);
        unset($user['img']);

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

    public function getListPosition()
    {
        $listPosition = $this->positionRepository->getAll();
        $positions = collect();

        foreach ($listPosition as $position) {
            $positions[$position->position_id] = $position->name;
        }

        return $positions;
    }
}
