<?php

namespace App\Repositories;

use App\Models\Program;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProgramRepository
{
    private const categoryRelationFields = 'category:id,name';
    private const focusRelationFields = 'focus:id,name';
    private const countryRelationFields = 'country:id,name';
    private const providerRelationFields = 'provider:id,name';

    public function store(array $data)
    {
        Program::create($data);
    }

    public function getAll(array $params): LengthAwarePaginator
    {
        return Program::with(self::categoryRelationFields)
            ->with(self::focusRelationFields)
            ->with(self::countryRelationFields)
            ->with(self::providerRelationFields)
            ->paginate($params['per_page']);
    }
}
