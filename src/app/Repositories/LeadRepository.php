<?php

namespace App\Repositories;

use App\Models\Lead;
use Illuminate\Pagination\LengthAwarePaginator;

class LeadRepository
{
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Lead::paginate($perPage);
    }

    public function store($data)
    {
        Lead::create($data);
    }
}
