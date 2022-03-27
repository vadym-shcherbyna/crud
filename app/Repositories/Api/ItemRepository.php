<?php
namespace App\Repositories\Api;

use App\Repositories\Api\Interfaces\ItemRepositoryInterface;
use App\Models\Item;

class ItemRepository implements ItemRepositoryInterface
{
    /*
     * @var integer $perPage
     */
    public $perPage = 50;

    /**
     * Items Index
     *
     * @param array $data
     * @return  \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(array $data) : \Illuminate\Pagination\LengthAwarePaginator
    {
        // Init
        $query = Item::query();

        /*
         * Filters
         */

        /* Name */
        if (isset($data['name'])) {
            $query->where('name', 'LIKE', '%' . $data['name'] . '%');
        }

        /* Category */
        if (isset($data['category'])) {
            $query->where('category', $data['category']);
        }

        /* Address */
        if (isset($data['address'])) {
            $query->where('address', 'LIKE', '%' . $data['address'] . '%');
        }

        /* Is Active */
        if (isset($data['is_active'])) {
            $query->where('is_active', $data['is_active']);
        }

        /*
         * Sorting
         */
        if (isset($data['sort_attr']) && isset($data['sort_dir'])) {
            $query->orderBy($data['sort_attr'], $data['sort_dir']);
        } else {
            $query->orderBy('id', 'desc');
        }

        /*
         * Paginate
         */
        if (isset($data['per_page'])) {
            $this->perPage = $data['per_page'];
        }

        return $query->paginate($this->perPage);
    }
}
