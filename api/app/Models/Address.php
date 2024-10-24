<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table address
 *
 * @param int $id
 * @param string $city
 * @param string $district
 * @param string $street
 * @param timestamp $created_at
 * @param timestamp $updated_at
 */
class Address extends Model
{
    use HasFactory;

    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'address';

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
        'city',
        'district',
        'street',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'city' => 'string',
        'dictrict' => 'string',
        'street' => 'string',
    ];
}
