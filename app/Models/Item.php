<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Record
 *
 * @mixin Eloquent
 * @package App\Models
 */
class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category',
        'name',
        'address',
        'slug',
        'announce',
        'description',
        'is_active',
        'notice',
    ];

    const CATEGORY_ONE = 1;
    const CATEGORY_TWO = 2;
    const CATEGORY_THREE = 3;
    const CATEGORIES = [
        self::CATEGORY_ONE => 'Category 1',
        self::CATEGORY_TWO => 'Category 2',
        self::CATEGORY_THREE => 'Category 3',
    ];

    /*
     * @return string
     */
    public function getDateAttribute()
    {
        return date('Y-m-d', \strtotime($this->created_at));
    }

    /*
     * @return string
     */
    public function getTimeAttribute()
    {
        return date('H:i', \strtotime($this->created_at));
    }
}
