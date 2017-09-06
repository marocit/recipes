<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'live',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withPivot('amount');
    }

    public function GetImageUrlAttribute($value)
    {
        $image= "";

        if (!is_null (array_first($this->uploads)))
        {
            #$imageUrl = array_first($this->uploads);
            $imageSingle = array_first($this->uploads);
            #$directory = config('cms.image.directory');
            $imagePath = public_path() . "/images/" .   $imageSingle->thumb_filename;
             if(file_exists($imagePath)) $image = asset("images/". $imageSingle->thumb_filename);
        }
        return $image;
    }

    public function GetImageUrlFullAttribute($value)
    {
        $image= "";

        if (!is_null (array_first($this->uploads)))
        {
            #$imageUrl = array_first($this->uploads);
            $imageSingle = array_first($this->uploads);
            #$directory = config('cms.image.directory');
            $imagePath = public_path() . "/images/" .   $imageSingle->filename;
             if(file_exists($imagePath)) $image = asset("images/". $imageSingle->filename);
        }
        return $image;
    }

    public function GetImageUrlAllAttribute($value)
    {
        $image= "";

        if (!is_null (array_first($this->uploads)))
        {
            #$imageUrl = array_first($this->uploads);
            $imageSingle = $this->uploads;
            #$directory = config('cms.image.directory');
            $imagePath = public_path() . "/images/" .   $imageSingle->filename;
             if(file_exists($imagePath)) $image = asset("images/". $imageSingle->filename);
        }
        return $image;
    }

    public function GetExcerptAttribute($value)
    {
        $description = $this->description;
        return str_limit($description, 150);

    }


}
