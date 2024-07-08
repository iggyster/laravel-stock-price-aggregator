<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @method static Stock updateOrCreate(array $attributes, array $values = [])
 */
class Stock extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'name',
        'open',
        'high',
        'low',
        'price',
    ];
}
