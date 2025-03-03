<?php

namespace App\Models;

use App\Casts\NewtonCubicIntCaster;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calculation extends Model
{
    use HasFactory, UuidTrait, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'inquiry_id',
        'purpose',
        'location',
        'length',
        'width',
        'raster',
        'eaves_height',
        'snowload',
        'craneload',
        'hookheight',
        'notes'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'snowload' => NewtonCubicIntCaster::class,
        'craneload' => NewtonCubicIntCaster::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }
}
