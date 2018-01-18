<?php

namespace App;

use App\Brand;
use App\Manufacturer;
use App\PartSubcategory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    /**
     * Constant for status - unaviable part
     * @var const
     */
    const UNAVAILABLE_PRODUCT = 'unavailable';

    /**
     * Constant for status - available part
     * @var const
     */
    const AVAILABLE_PRODUCT = 'available';
    /**
     * array of mass-assignment attributes
     * @var [type]
     */
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'status',
        'quantity',
        'manufacturer_id',
        'brand_id',
        'subcategories_id',
    ];
    /**
     * isAvailable function to see status of Part
     * @return boolean
     */
    public function isAvailable()
    {
        return $this->status == Part::AVAILABLE_PRODUCT;
    }
    /**
     * Relation between Part model and Brand model
     * @return void
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    /**
     * Relation of manufacturer model and Part Model
     * @return void
     */
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    /**
     * Relation of subcategories model and part model
     * @return [type] [description]
     */
    public function subcategories()
    {
        return $this->belongsTo(PartSubcategory::class);
    }

}
