<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\Interfaces\ItemRepositoryInterface;
use App\Http\Resources\ItemResource;
use App\Http\Requests\Api\Items\IndexRequest;

class ItemController extends Controller
{
    /*
     * @var AbonentRepositoryInterface
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
}
