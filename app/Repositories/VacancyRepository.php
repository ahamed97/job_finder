<?php

namespace App\Repositories;

use App\Models\Vacancy;
use App\Repositories\VacancyInterface;

class VacancyRepository implements VacancyInterface
{
    private Vacancy $vacancy;

    public function __construct(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
    }

    public function findByVacancyId($id)
    {
        $vacancy = $this->vacancy::with('skills')->findOrFail($id);

        return $vacancy;
    }

    public function searchByCountryOrCityWithSort()
    {
        $vacancies = $this->vacancy;
        if($search = request()->get('search')){
            $vacancies = $vacancies->where('country','like','%'.$search.'%')
            ->orWhere('country','like','%'.$search.'%');
        }

        if($sort = request()->only('sort') && request()->get('sort') == 'asc'){
            $vacancies = $vacancies->orderBy('seniority_level')
                ->orderBy('salary');
        }

        return $vacancies->with('skills')->paginate();
    }

    public function findMostMatchingPosition()
    {
        $juniorLevels = ['Junior'];
        $middleLevels = ['Middle'];
        $seniorLevels = ['Senior','Tech management'];
        $vacancies = $this->vacancy;
        if($currentExperiencesLevel = request()->get('current_experiences_level') && $skills = request()->get('skills')){

            if(in_array($currentExperiencesLevel, $juniorLevels)){
                $vacancies = $vacancies->whereIn('seniority_level',$middleLevels);
            }
            else if(in_array($currentExperiencesLevel, $middleLevels)){
                $vacancies = $vacancies->whereIn('seniority_level',$seniorLevels);
            }
            else if(in_array($currentExperiencesLevel, $seniorLevels)){
                $vacancies = $vacancies->whereIn('seniority_level',$seniorLevels);
            }

            $vacancies = $vacancies->whereHas('skills',function($q) use($skills){
                $q->whereIn('name',explode(',',$skills));
            });

            $vacancies = $vacancies->orderBy('created_at','DESC');
        }

        return $vacancies->first();
    }
}
