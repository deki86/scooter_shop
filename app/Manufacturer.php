<?php

namespace App;

use App\Part;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    /**
     * array of mass-assignment attribute
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    /**
     * Relation between Part model and Manufacturer
     * @return void
     */
    public function part()
    {
        return $this->hasMany(Part::class, 'manufacturer_id');
    }
}
