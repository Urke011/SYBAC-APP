<?php

namespace App\Models;

use App\Casts\NewtonCubicIntCaster;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    use HasFactory, UuidTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'purpose',
        'location',
        'length',
        'width',
        'snowload',
        'craneload',
        'hookheight',
        'eaves_height',
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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function calculations()
    {
        return $this->hasMany(Calculation::class);
    }
}
