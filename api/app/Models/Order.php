<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table order
 *
 * @param string $id 訂單編號，例如 A0000001
 * @param string $name
 * @param int $address_id ref:address.id
 * @param double $price
 * @param string $currency ex. TWD
 * @param timestamp $created_at
 * @param timestamp $updated_at
 */
class Order extends Model
{
    use HasFactory;

    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * the attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'address_id',
        'price',
        'currency',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'address_id' => 'integer',
        'price' => 'double',
        'currency' => 'string',
    ];
}
