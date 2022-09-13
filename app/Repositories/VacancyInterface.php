<?php

namespace App\Repositories;

interface VacancyInterface
{
    public function findByVacancyId($vacancy);
    public function searchByCountryOrCityWithSort();
    public function findMostMatchingPosition();
}
