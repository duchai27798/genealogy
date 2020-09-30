<?php

namespace App\Http\Controllers\Client;

use App\classes\TreeNode;
use App\Http\Controllers\Controller;
use App\Repositories\PersonRepository;
use Illuminate\Http\Request;

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
            $dataResource[$person->people_id] = new TreeNode($person->people_id, $person->fullName(), $person->parent);
        }

        return $dataResource;
    }
}
