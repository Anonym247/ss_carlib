<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Services\BrandService;
use App\Traits\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use ApiResponder;

    /**
     * @var BrandService
     */
    private $brandService;

    /**
     * @param BrandService $brandService
     */
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $brands = $this->brandService->getAll();

        return $this->data(__('messages.list'), $brands);
    }

    /**
     * @param BrandRequest $request
     * @return JsonResponse
     */
    public function store(BrandRequest $request): JsonResponse
    {
        $brand = $this->brandService->save(new Brand(), $request->validated());

        return $this->data(__('messages.saved'), $brand);
    }

    /**
     * @param BrandRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(BrandRequest $request, int $id): JsonResponse
    {
        $brand = $this->brandService->getById($id);

        $brand = $this->brandService->save($brand, $request->validated());

        return $this->data(__('messages.saved'), $brand);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $brand = $this->brandService->getById($id);

        $this->brandService->delete($brand);

        return $this->success(__('messages.deleted'));
    }
}
