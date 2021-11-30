<?php

namespace App\Repositories;

use App\Models\Lead;
use Illuminate\Pagination\LengthAwarePaginator;

class LeadRepository
{
    private const programRelationField = 'program:id,title';

    private const providerRelationField = 'provider:id,name';

    public function getAll(array $queryParams): LengthAwarePaginator
    {
        return Lead::with(self::programRelationField)
            ->with(self::providerRelationField)
            ->paginate($queryParams['per_page'])
            ->withQueryString();
    }

    public function store(array $data)
    {
        Lead::create($data);
    }
}
