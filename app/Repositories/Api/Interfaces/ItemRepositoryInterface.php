<?php
declare( strict_types = 1 );

namespace App\Repositories\Api\Interfaces;

use App\Models\Record;

/**
 * Interface CallRepositoryInterface
 * @package App\Repositories\Interfaces\Api
 */
interface ItemRepositoryInterface
{
    /**
     * Calls Index
     *
     * @param array $data
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(array $data) : \Illuminate\Pagination\LengthAwarePaginator;
}
