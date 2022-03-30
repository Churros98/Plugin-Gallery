<?php

namespace Azuriom\Plugin\Gallery\Models;

use Azuriom\Models\Traits\HasTablePrefix;
use Azuriom\Models\Image;
use Azuriom\Plugin\Gallery\Models\Category;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */

class Links extends Model
{
    use HasTablePrefix;

    public $timestamps = false;

    /**
     * The table prefix associated with the model.
     *
     * @var string
     */
    protected $prefix = 'gallery_';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_id', 'category_id'
    ];

        
    /**
     * Get the category associated with the Link
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the image associated with the Link
     */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}