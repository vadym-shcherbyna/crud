<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\Interfaces\ItemRepositoryInterface;
use App\Http\Resources\ItemResource;
use App\Http\Requests\Api\Items\IndexRequest;
use App\Http\Requests\Api\Items\StoreRequest;
use App\Http\Requests\Api\Items\UpdateRequest;
use App\Http\Requests\Api\Items\ActivityRequest;
use App\Models\Item;

class ItemController extends Controller
{
    /*
     * @var ItemRepositoryInterface
     */
    private $repository;

    /*
     * @param ItemRepositoryInterface $repository
     * @return void
     */
    public function __construct(ItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /*
     * Items Index
     *
     * @param IndexRequest $request
     * @return Illuminate\Http\Resources\Json\JsonResource
     */
    public function index(IndexRequest $request) : \Illuminate\Http\Resources\Json\JsonResource
    {
        $validated = $request->validated();

        $records = $this->repository->index($validated);

        return ItemResource::collection($records);
    }

    /*
     * Items Store
     *
     * @param StoreRequest $request
     * @return Illuminate\Http\JsonResponse
     *
     */
    public function store(StoreRequest $request) : \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();

        $item = $this->repository->store($validated);

        return response()->json($item);
    }

    /*
     * Items Edit
     *
     * @param Item $item
     * @return Illuminate\Http\JsonResponse
     *
     */
    public function edit(Item $item) : \Illuminate\Http\JsonResponse
    {
        return response()->json($item);
    }

    /*
     * Items Update
     *
     * @param UpdateRequest $request
     * @param Item $item
     * @return Illuminate\Http\JsonResponse
     *
     */
    public function update(UpdateRequest $request, Item $item) : \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();

        $item = $this->repository->update($item, $validated);

        return response()->json($item);
    }

    /*
     * Items Destroy
     *
     * @param Item $item
     * @return void
     */
    public function destroy(Item $item)
    {
        $item->delete();
    }

    /*
     * Items Activity
     *
     * @param ActivityRequest $request
     * @param Item $item
     * @return void
     */
    public function activity(ActivityRequest $request, Item $item)
    {
        $validated = $request->validated();

        $this->repository->update($item, $validated);
    }
}
