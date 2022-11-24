<?php

namespace App\Services;

use App\Exceptions\GeneralException;
use App\Extensions\Status;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    /**
     * @var CarService
     */
    private $carService;

    /**
     * @param CarService $carService
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function getByUser(int $userId): Collection
    {
        return Order::query()->where('user_id', $userId)->get();
    }

    /**
     * @param int $carId
     * @return void
     * @throws GeneralException
     */
    public function checkCarAvailability(int $carId): void
    {
        $car = $this->carService->getById($carId);

        $rent = Order::query()
            ->where('car_id', $car->getKey())
            ->where('date_from', '>=', now())
            ->where('date_to', '<=', now())
            ->whereIn('status_id', [Status::ORDER_APPROVED, Status::ORDER_ON_RENT])
            ->first();

        if ($rent) {
            throw new GeneralException(__('messages.car_is_not_free'));
        }
    }

    /**
     * @param array $attributes
     * @return void
     */
    public function create(array $attributes): void
    {
        Order::query()->create([
            'user_id' => Auth::id(),
            'car_id' => $attributes['car_id'],
            'date_from' => $attributes['date_from'],
            'date_to' => $attributes['date_to'],
            'status_id' => Status::ORDER_PENDING,
        ]);
    }
}
