<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Models\Provider;
use App\Repositories\ProviderRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class ProviderController extends Controller
{
    private ProviderRepository $providerRepository;

    public function __construct(ProviderRepository $providerRepository)
    {
        $this->providerRepository = $providerRepository;
    }

    public function getAll(Request $request)
    {
        try {
            $this->authorize('viewAny', Provider::class);
            return response($this->providerRepository->getAll($request->get("per_page")));
        } catch (\Exception $exception) {
            return response($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
    }

    public function createNew(CreateProviderRequest $request)
    {
        try {
            $this->authorize('create', Provider::class);
            $data = $request->validated();
            $this->providerRepository->store($data);
            return \response(['message' => 'new provider was inserted!']);
        } catch (\Exception $exception) {
            return \response($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        } catch (UnauthorizedHttpException $exception) {
            return \response($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(UpdateProviderRequest $request, int $id)
    {
        $data = $request->validated();
        $this->providerRepository->update($id, $data);
        return \response(['message' => 'Provider was updated']);
    }

    public function detail(int $id)
    {
        try {
            return \response($this->providerRepository->detail($id));
        } catch (\Exception $exception) {
            return \response($exception->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function delete(int $id)
    {
        $this->providerRepository->delete($id);
        return \response(['message' => 'Provider was deleted']);
    }
}
