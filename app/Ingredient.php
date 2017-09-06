<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'unit',
        'einheit'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
