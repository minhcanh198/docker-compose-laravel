<?php

namespace App\Repositories;

use App\Models\Lead;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class LeadRepository
{
    private const programRelationField = 'program:id,title';

    private const providerRelationField = 'provider:id,name';

    public function getAll(array $queryParams): LengthAwarePaginator
    {
        $sql = Lead::with(self::programRelationField)
            ->with(self::providerRelationField);
        if (isset($queryParams['category'])) {
            $category = $queryParams['category'];
            $sql->whereHas('program', function ($query) use ($category) {
                $query->where('category_id', $category);
            });
        }
        if (isset($queryParams['country'])) {
            $countryID = $queryParams['country'];
            $sql->whereHas('program', function ($query) use ($countryID) {
                $query->where('country_id', $countryID);
            });
        }
        if (isset($queryParams['date'])) {
            $sql->whereDate('created_at', Carbon::parse($queryParams['date']));
        }

        return $sql->paginate($queryParams['per_page'])
            ->withQueryString();
    }

    public function store(array $data)
    {
        Lead::create($data);
    }
}
