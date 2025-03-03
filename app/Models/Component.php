<?php

namespace App\Models;

use App\Casts\PriceIntCaster;
use App\Casts\WeightIntCaster;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use HasFactory, UuidTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'color', 'is_iso', 'grid', 'width', 'height', 'length', 'weight', 'area', 'price_mount', 'price_per_unit'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'deleted_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_iso' => 'boolean',
        'price_mount' => PriceIntCaster::class,
        'price_per_unit' => PriceIntCaster::class,
        'weight' => WeightIntCaster::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
