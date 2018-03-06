<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = ['id', 'image'];

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $id
     * @return Images
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function products()
    {
        return $this->belongsToMany('App\Products', 'product_images', 'image_id', 'product_id');
    }
}
