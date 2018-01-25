<?php

namespace App;

use App\PartSubcategory;
use Illuminate\Database\Eloquent\Model;

class PartCategory extends Model
{
    /**
     * array of mass-assignment attributes
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Relation between PartSubcategories model and PartCategory model
     * @return void
     */
    public function subcategories()
    {
        return $this->hasMany(PartSubcategory::class, 'categories_id');
    }
}
