<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadRequest;
use App\Models\Lead;
use App\Repositories\LeadRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LeadController extends Controller
{
    private LeadRepository $leadRepository;

    public function __construct(LeadRepository $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }

    public function getAll(Request $request)
    {
        try {
            $this->authorize('viewAny', Lead::class);
            return response($this->leadRepository->getAll($request->all()));
        } catch (\Exception $exception) {
            return response($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
    }

    public function createNew(CreateLeadRequest $request)
    {
        try {
            $data = $request->validated();
            $this->authorize('create', Lead::class);
            $this->leadRepository->store($data);
            return response(['message' => 'OK']);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (AuthorizationException $exception) {
            return response($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
    }
}
