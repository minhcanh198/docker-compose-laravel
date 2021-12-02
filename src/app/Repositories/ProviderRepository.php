<?php

namespace App\Repositories;

use App\Models\Provider;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

class ProviderRepository
{
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
        return Provider::findOrFail($id);
    }

    public function delete(int $id)
    {
        Provider::where('id', $id)->delete();
    }
}
