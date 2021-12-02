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
        $data['status'] = 'NEW';
        return Program::create($data);
    }

    public function getAll(array $params): LengthAwarePaginator
    {
        return Program::with(self::categoryRelationFields)
            ->with(self::focusRelationFields)
            ->with(self::countryRelationFields)
            ->with(self::providerRelationFields)
            ->paginate($params['per_page']);
    }

    public function detail(int $id)
    {
        return Program::with(self::categoryRelationFields)
            ->with(self::focusRelationFields)
            ->with(self::countryRelationFields)
            ->with(self::providerRelationFields)
            ->findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        Program::where('id', $id)
            ->update($data);
    }

    public function delete(int $id)
    {
        Program::where('id', $id)->delete();
    }
}
