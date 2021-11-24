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
}
