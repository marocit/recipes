<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'filename',
        'size',
        'thumb_filename',
        'thumb_size'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

}
