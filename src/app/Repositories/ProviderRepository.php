<?php

namespace App\Repositories;

use App\Models\Provider;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

class ProviderRepository
{
    private const countryRelationField = 'country:id,name';

    public function getAll(int $rowPerPage = 10): LengthAwarePaginator
    {
        return Provider::paginate($rowPerPage);
    }

    public function store(array $data)
    {
        Provider::create($data);
    }

    public function update(int $id, array $data)
    {
        Provider::where('id', $id)
            ->update($data);
    }

    public function detail(int $id)
    {
        return Provider::with(self::countryRelationField)->findOrFail($id);
    }

    public function delete(int $id)
    {
        Provider::where('id', $id)->delete();
    }
}
