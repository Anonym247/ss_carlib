<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use App\Traits\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use ApiResponder;

    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $orders = $this->orderService->getByUser(Auth::id());

        return $this->data(__('messages.list'), $orders);
    }

    /**
     * @param OrderRequest $request
     * @return JsonResponse
     * @throws GeneralException
     */
    public function checkout(OrderRequest $request): JsonResponse
    {
        $this->orderService->checkCarAvailability($request->get('car_id'));

        $this->orderService->create($request->validated());

        return $this->success(__('messages.saved'));
    }
}
