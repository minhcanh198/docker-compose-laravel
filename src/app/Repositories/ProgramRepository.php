<?php

namespace App\Repositories;

use App\Models\Program;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProgramRepository
{
    public function store(array $data)
    {
        Program::create($data);
    }

    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Program::paginate($perPage);
    }
}
