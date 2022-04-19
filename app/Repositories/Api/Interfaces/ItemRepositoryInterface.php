<?php
namespace App\Repositories\Api\Interfaces;

use App\Models\Item;

/**
 * Interface ItemRepositoryInterface
 * @package App\Repositories\Interfaces\Api
 */
interface ItemRepositoryInterface
{
    /**
     * Items Index
     *
     * @param array $data
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(array $data) : \Illuminate\Pagination\LengthAwarePaginator;

    /**
     * Items Store
     *
     * @param array $data
     * @return Item
     */
    public function store(array $data) : Item;

    /**
     * Update Item
     *
     * @param Item $item
     * @param array $data
     *
     * @return Item
     */
    public function update(Item $item, array $data) : Item;
}
