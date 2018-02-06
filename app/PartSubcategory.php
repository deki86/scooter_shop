<?php

namespace App;

use App\Part;
use App\PartCategory;
use Illuminate\Database\Eloquent\Model;

class PartSubcategory extends Model
{
    /**
     * array of mass-assignment attributes
     * @var [type]
     */
    protected $fillable = [
        'categories_id',
        'name',
    ];
    /**
     * Relation between PartCategory model and PartSubcategory model
     * @return void
     */
    public function categories()
    {
        return $this->belongsTo(PartCategory::class);
    }
    /**
     * Relation between of PartSubcategory model and Part model
     * @return void
     */
    public function part()
    {
        return $this->hasMany(Part::class, 'subcategories_id');
    }
}
