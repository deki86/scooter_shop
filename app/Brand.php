<?php

namespace App;

use App\Part;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * array of mass-assignment attribute
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Relation between Part and Brand model
     * @return void
     */
    public function part()
    {
        return $this->hasMany(Part::class);
    }
}
