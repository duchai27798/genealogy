<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\PersonRepository;

class AjaxController extends Controller
{
    private $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getResourceTree()
    {
        $listPerson = $this->personRepository->getAll();
        $dataResource = collect();

        foreach ($listPerson as $person) {
            $dataResource[$person->people_id] = (object) [
                'id' => $person->people_id,
                'name' => $person->getFullName(),
                'parent' => $person->parent
            ];
        }

        return $dataResource;
    }
}
