<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
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
            $newProgram = $this->programRepository->store($data);
            return response(['program_id' => $newProgram->id]);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getAll(Request $request)
    {
        try {
            $this->authorize('viewAny', Program::class);
            return \response($this->programRepository->getAll($request->all()));
        } catch (\Exception $exception) {
            return \response($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
    }

    public function detail(int $id)
    {
        try {
            return \response($this->programRepository->detail($id));
        } catch (\Exception $exception) {
            return \response($exception->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function update(UpdateProgramRequest $request, int $id)
    {
        $data = $request->validated();
        $this->programRepository->update($id, $data);
        return \response(['message' => 'OK']);
    }

    public function delete(int $id)
    {
        $this->programRepository->delete($id);
        return \response(['message' => 'OK']);
    }
}
