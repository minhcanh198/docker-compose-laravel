<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProgramRequest;
use App\Models\Program;
use App\Repositories\ProgramRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProgramController extends Controller
{
    private ProgramRepository $programRepository;

    public function __construct(ProgramRepository $programRepository)
    {
        $this->programRepository = $programRepository;
    }

    public function createNew(CreateProgramRequest $request)
    {
        try {
            $this->authorize('create', Program::class);
            $data = $request->validated();
            $this->programRepository->store($data);
            return response(['message' => 'OK']);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getAll(Request $request)
    {
        try {
            $this->authorize('viewAny', Program::class);
            return \response($this->programRepository->getAll());
        } catch (\Exception $exception) {
            return \response($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
    }
}
