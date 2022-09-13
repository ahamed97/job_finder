<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Repositories\VacancyRepository;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    private VacancyRepository $vacancyRepository;

    public function __construct(VacancyRepository $vacancyRepository)
    {
        $this->vacancyRepository = $vacancyRepository;
    }


    public function show($vacancy)
    {

        $vacancy =  $this->vacancyRepository->findByVacancyId($vacancy);
        return response()->json([
            'data'=>$vacancy
        ]);
    }

    public function index()
    {
        return $this->vacancyRepository->searchByCountryOrCityWithSort();
    }

    public function matchingPosition()
    {

        $test =  $this->vacancyRepository->findMostMatchingPosition();
        return response()->json([
            'data'=>$test
        ]);
    }
}
